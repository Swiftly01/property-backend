<?php

namespace App\Http\Controllers;

use App\Enums\PropertyMediaTypeEnum;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Models\PropertyMedia;
use Illuminate\Http\Request;

class PodcastRedirectController extends BasePropertyMediaRedirectController
{
    protected string $mediaType = PropertyMediaTypeEnum::PODCAST->value;

    public function show(PropertyMedia $podcast)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($podcast);
        return app(PropertyMediaController::class)->show($propertyMedia, $type);
    }

    public function edit(PropertyMedia $podcast)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($podcast);
        return app(PropertyMediaController::class)->edit($propertyMedia, $type);
    }

    public function update(UpdatePropertyMediaRequest $request, PropertyMedia $podcast)
    {
        ['propertyMedia' => $propertyMedia] = $this->getType($podcast);
        return app(PropertyMediaController::class)->update($this->mergeRequest($request), $propertyMedia);
    }

    public function destroy(PropertyMedia $podcast)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($podcast);
        return app(PropertyMediaController::class)->destroy($propertyMedia, $type);
    }

    public function showpodcasts(Request $request)
    {
        $this->mergeRequest($request);
        return app(PropertyMediaController::class)->mediaList(request: $request);
    }

    public function showpodcastDetails(PropertyMedia $podcast)
    {
        ['type' => $type, 'propertyMedia' => $propertyMedia] = $this->getType($podcast);
        return app(PropertyMediaController::class)->showPropertyMediaDetails(propertyMedia: $propertyMedia, type: $type);
    }
}
