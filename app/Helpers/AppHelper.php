<?php

namespace App\Helpers;

use App\Events\ActivityLogged;
use App\Models\SellRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AppHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public  function fetchStates()
    {

        try {
            /*
            $response = Http::timeout(5)->get('https://temikeezy.github.io/nigeria-geojson-data/data/full.json');

            if ($response->successful()) {
                 return $response->json();
            }
            */
            Log::warning('States fetch returned non-successfull response');
            return null;
        } catch (Exception $e) {

            Log::error(message: "States fetching error:  {$e->getMessage()}");

            return null;
        }
    }


    public  function mapStateToArray()
    {
        $statesObject = $this->fetchStates();

        $location = collect($statesObject)->mapWithKeys(function ($item) {
            $name = $item['state'];
            $key = strtolower($name);
            $label = $name;

            return [$key => $label];
        });

        return $location;
    }


    public function dispatchActivityEvent(string $type, string $actionMessage, ?string $performedBy = null): void
    {
        event(new ActivityLogged(
            action: $actionMessage,
            type: $type,
            performedBy: $performedBy ?? auth()->user()?->name ?? 'System',

        ));
    }

    public function processFileUploads(Request $request,  Model $model): void
    {
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
    }
}
