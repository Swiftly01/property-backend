<?php

namespace App\Http\Controllers;

use App\Helpers\RepositoryHelper;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function __construct(private RepositoryHelper $repositoryHelper) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyOtherImage(Media $media)
    {
        try {

            $media->delete();

            ToastMagic::success('Image deleted successfully');

            return back();
        } catch (Exception $e) {

            Log::error(message: "Failed to delete media: {$e->getMessage()}");

            ToastMagic::error('Unable to delete image!!');

            return back();
        }
    }

    public function destroyThumbnail(Model $model)
    {
        try {

            $isDeleted = $this->repositoryHelper->handleDeleteThumbnail(model: $model);

            if (!$isDeleted) {

                ToastMagic::error('Unable to delete thumbnail!!');

                return back();
            }

            ToastMagic::success("thumbnail deleted successfully");
            return back();
        } catch (Exception $e) {

            Log::error("Error during thumbnail delete process {$e->getMessage()}");

            ToastMagic::error('Unable to delete thumbnail!!');

            return back();
        }
    }
}
