<?php

namespace App\Services;

use App\Exceptions\MediaProcessingException;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function attachMedia(Request $request,  Model $model): void
    {
        try {
            DB::transaction(function () use ($request, $model) {

                if ($request->hasFile('thumbnail')) {
                    $model->clearMediaCollection('thumbnail');
                    $model->addMediaFromRequest('thumbnail')
                        ->toMediaCollection('thumbnail');
                }

                if ($request->hasFile('other_images')) {
                    $files = $request->file('other_images');
                    $files = is_array($files) ? $files : [$files];


                    foreach ($files as $file) {
                        if ($file->isValid()) {
                            $model->addMedia($file)
                                ->toMediaCollection('other_images');
                        }
                    }
                }
            });
        } catch (Exception $e) {
            throw new  MediaProcessingException("Failed to upload image files for model ID {$model->id}" . $e->getMessage());
        }
    }


    public function destroy(Model $model): bool
    {
        $model->clearMediaCollection('thumbnail');
        $model->clearMediaCollection('other_images');

        return  $model->delete();
    }
}
