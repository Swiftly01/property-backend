<?php

namespace App\Http\Controllers;

use App\Enums\PropertyMediaTypeEnum;
use App\Http\Requests\StorePropertyMediaRequest;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;

class PhotographRedirectContoller extends Controller
{
    public function index(Request $request)
    {
        return app(PropertyMediaController::class)->index($this->mergeRequest(request: $request));
    }

    public function create(Request $request)
    {
        return app(PropertyMediaController::class)->create($this->mergeRequest(request: $request));
    }

    public function store(StorePropertyMediaRequest $request)
    {
        return app(PropertyMediaController::class)->store($this->mergeRequest(request: $request));
    }

    public function show(PropertyMedia $photograph)
    {
        $type = PropertyMediaTypeEnum::PHOTOGRAPHY->value;
        $propertyMedia = $photograph;
        return app(PropertyMediaController::class)->show($propertyMedia, $type);
    }

    public function edit(PropertyMedia $photograph)
    {
        $type = PropertyMediaTypeEnum::PHOTOGRAPHY->value;
        $propertyMedia = $photograph;
        return app(PropertyMediaController::class)->edit($propertyMedia, $type);
    }

    public function update(UpdatePropertyMediaRequest $request, PropertyMedia $photograph)
    {
        $this->mergeRequest(request: $request);
        $propertyMedia = $photograph;

        return app(PropertyMediaController::class)->update($request, $propertyMedia);
    }


    public function showPhotographs(Request $request)
    {
         $this->mergeRequest(request: $request);
         return app(PropertyMediaController::class)->mediaList(request: $request);
    }

    public function showPhotographDetails(PropertyMedia $photograph)
    {
         $type = PropertyMediaTypeEnum::PHOTOGRAPHY->value;
         $propertyMedia = $photograph;

         return app(PropertyMediaController::class)->showPropertyMediaDetails(propertyMedia: $propertyMedia, type: $type);
    }

    public function destroy(PropertyMedia $photograph)
    {
        $type = PropertyMediaTypeEnum::PHOTOGRAPHY->value;
        $propertyMedia = $photograph;
        return app(PropertyMediaController::class)->destroy($propertyMedia, $type);
    }

    public function mergeRequest(Request $request)
    {
        return  $request->merge(['type' => PropertyMediaTypeEnum::PHOTOGRAPHY->value]);
    }
}
