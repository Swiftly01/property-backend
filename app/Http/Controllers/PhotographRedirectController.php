<?php

namespace App\Http\Controllers;

use App\Enums\PropertyMediaTypeEnum;
use App\Http\Requests\StorePropertyMediaRequest;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Models\PropertyMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PhotographRedirectController extends BasePropertyMediaRedirectController
{
    protected string $mediaType = PropertyMediaTypeEnum::PHOTOGRAPHY->value;

    public function show(PropertyMedia $photograph)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($photograph);
        return app(PropertyMediaController::class)->show($propertyMedia, $type);
    }

    public function edit(PropertyMedia $photograph)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($photograph);
        return app(PropertyMediaController::class)->edit($propertyMedia, $type);
    }

    public function update(UpdatePropertyMediaRequest $request, PropertyMedia $photograph)
    {
        ['propertyMedia' => $propertyMedia] = $this->getType($photograph);
        return app(PropertyMediaController::class)->update($this->mergeRequest($request), $propertyMedia);
    }

    public function destroy(PropertyMedia $photograph)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($photograph);
        return app(PropertyMediaController::class)->destroy($propertyMedia, $type);
    }

    public function showPhotographs(Request $request)
    {
        $this->mergeRequest($request);
        return app(PropertyMediaController::class)->mediaList(request: $request);
    }

    public function showPhotographDetails(PropertyMedia $photograph)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($photograph);
        return app(PropertyMediaController::class)->showPropertyMediaDetails(propertyMedia: $propertyMedia, type: $type);
    }
}
