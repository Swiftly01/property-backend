<?php

namespace App\Http\Controllers;

use App\Enums\PropertyMediaTypeEnum;
use App\Http\Requests\StorePropertyMediaRequest;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;

class StagingRedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return app(PropertyMediaController::class)->index($this->mergeRequest(request: $request));
    }

    public function showStagings(Request $request)
    {
        $this->mergeRequest(request: $request);
        return app(PropertyMediaController::class)->mediaList(request: $request);
    }

     public function showStagingDetails(PropertyMedia $staging)
    {
         $type = PropertyMediaTypeEnum::STAGING->value;
         $propertyMedia = $staging;

         return app(PropertyMediaController::class)->showPropertyMediaDetails(propertyMedia: $propertyMedia, type: $type);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return app(PropertyMediaController::class)->create($this->mergeRequest(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyMediaRequest $request)
    {
        return app(PropertyMediaController::class)->store($this->mergeRequest(request: $request));
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyMedia $staging)
    {
        $type = PropertyMediaTypeEnum::STAGING->value;
        $propertyMedia = $staging;
        return app(PropertyMediaController::class)->show($propertyMedia, $type);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyMedia $staging)
    {
        $type = PropertyMediaTypeEnum::STAGING->value;
        $propertyMedia = $staging;
        return app(PropertyMediaController::class)->edit($propertyMedia, $type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyMediaRequest $request, PropertyMedia $staging)
    {
        $this->mergeRequest(request: $request);
        $propertyMedia = $staging;

        return app(PropertyMediaController::class)->update($request, $propertyMedia);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyMedia $staging)
    {
        $type = PropertyMediaTypeEnum::STAGING->value;
        $propertyMedia = $staging;
        return app(PropertyMediaController::class)->destroy($propertyMedia, $type);
    }

    public function mergeRequest(Request $request)
    {
        return  $request->merge(['type' => PropertyMediaTypeEnum::STAGING->value]);
    }
}
