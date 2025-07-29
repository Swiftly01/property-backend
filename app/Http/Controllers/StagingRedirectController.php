<?php

namespace App\Http\Controllers;

use App\Enums\PropertyMediaTypeEnum;
use App\Http\Requests\StorePropertyMediaRequest;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;

class StagingRedirectController extends BasePropertyMediaRedirectController
{
    protected string $mediaType = PropertyMediaTypeEnum::STAGING->value;

    /**
     * Display the specified resource.
     */
    public function show(PropertyMedia $staging)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($staging);
        return app(PropertyMediaController::class)->show($propertyMedia, $type);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyMedia $staging)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($staging);
        return app(PropertyMediaController::class)->edit($propertyMedia, $type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyMediaRequest $request, PropertyMedia $staging)
    {
        ['propertyMedia' => $propertyMedia] = $this->getType($staging);
        return app(PropertyMediaController::class)->update($this->mergeRequest(request: $request), $propertyMedia);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyMedia $staging)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($staging);
        return app(PropertyMediaController::class)->destroy($propertyMedia, $type);
    }

    public function showStagings(Request $request)
    {
        $this->mergeRequest(request: $request);
        return app(PropertyMediaController::class)->mediaList(request: $request);
    }

    public function showStagingDetails(PropertyMedia $staging)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($staging);
        return app(PropertyMediaController::class)->showPropertyMediaDetails(propertyMedia: $propertyMedia, type: $type);
    }
}
