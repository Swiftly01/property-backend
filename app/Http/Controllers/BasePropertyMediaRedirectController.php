<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyMediaRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BasePropertyMediaRedirectController extends Controller
{
    protected string $mediaType;

    public function index(Request $request)
    {
        return app(PropertyMediaController::class)->index($this->mergeRequest($request));
    }

    public function create(Request $request)
    {
        return app(PropertyMediaController::class)->create($this->mergeRequest($request));
    }

    public function store(StorePropertyMediaRequest $request)
    {
        return app(PropertyMediaController::class)->store($this->mergeRequest($request));
    }

    protected function mergeRequest(Request $request): Request
    {
        return $request->merge(['type' => $this->mediaType]);
    }

    protected function getType(Model $model): array
    {
        return [
            'type' => $this->mediaType,
            'propertyMedia' => $model,  
        ];
    }
}
