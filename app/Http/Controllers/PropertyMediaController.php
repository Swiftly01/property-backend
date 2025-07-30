<?php

namespace App\Http\Controllers;

use App\Enums\PropertyMediaTypeEnum;
use App\Exceptions\MediaProcessingException;
use App\Exceptions\PropertyMediaCreateException;
use App\Models\PropertyMedia;
use App\Http\Requests\StorePropertyMediaRequest;
use App\Http\Requests\UpdatePropertyMediaRequest;
use App\Services\PropertyMediaService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PropertyMediaController extends Controller
{
    public function __construct(public PropertyMediaService $propertyMediaService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $this->getRequestType(request: $request);
        $response = $this->propertyMediaService->validatePropertyMediaType(request: $request, type: $type);

        $view = $response['view'];
        $data = $response['data'];
        $type = $response['type'];
        
        return view($view, compact('data', 'type'));
    }

    public function mediaList(Request $request)
    {
        $type = $this->getRequestType(request: $request);
        $response = $this->propertyMediaService->getPropertyMediaData(request: $request, type: $type);

        $view = $response['view'];
        $data = $response['data'];
        $type = $response['type'];

        return view($view, compact('data', 'type'));
    }

    public function showPropertyMediaDetails(PropertyMedia $propertyMedia, string $type)
    {
        $view = $this->propertyMediaService->getPropertyMediaDetailsView(type: $type);

        return view($view, compact('propertyMedia', 'type'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $type = $this->getRequestType(request: $request);
        $properties = $this->propertyMediaService->getAllProperties();
        $view = $this->propertyMediaService->getMediaTypeCreateView(type: $type);

        return view($view, compact('properties', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyMediaRequest $request)
    {
        try {

            $type = $this->getRequestType(request: $request);
            $this->propertyMediaService->handleCreatePropertyMedia(request: $request, type: $type);

            ToastMagic::success("$request->type uploaded successfully");

            return back();
        } catch (MediaProcessingException $e) {

            Log::error("Media upload failed {$e->getMessage()}");
            ToastMagic::error('Image upload failed');
        } catch (PropertyMediaCreateException $e) {

            Log::error("$request->type create failed {$e->getMessage()}");
            ToastMagic::error("Unable to update $request->type");
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyMedia $propertyMedia, string $type)
    {
        $view = $this->propertyMediaService->getMediaTypeShowView(type: $type);

        return view($view, compact('propertyMedia', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyMedia $propertyMedia, string $type)
    {
        $view = $this->propertyMediaService->getMediaTypeEditView(type: $type);
        $properties = $this->propertyMediaService->getAllProperties();

        return view($view, compact('propertyMedia', 'properties', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyMediaRequest $request, PropertyMedia $propertyMedia)
    {
        try {

            $type = $this->getRequestType(request: $request);
            $this->propertyMediaService->handlePropertyMediaUpdate(request: $request, propertyMedia: $propertyMedia, type: $type);

            ToastMagic::success("$request->type data updated successfully");

            return back();
        } catch (MediaProcessingException $e) {

            Log::error("Media upload failed {$e->getMessage()}");
            ToastMagic::error('Image upload failed');
        } catch (PropertyMediaCreateException $e) {

            Log::error("$request->type create failed {$e->getMessage()}");
            ToastMagic::error("Unable to update $request->type");
        }

        return back();
    }


    public function getRequestType(Request $request)
    {
        $type = $request->input('type');

        if (!in_array($type, PropertyMediaTypeEnum::values())) {
            abort(404, 'Invalid media type');
        }

        return $type;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyMedia $propertyMedia, string $type)
    {
        try {
            
            $this->propertyMediaService->handleDeletePropertyMedia(propertyMedia: $propertyMedia);
            ToastMagic::success("$type data deleted successfully");

            $mediaType = Str::plural($type);

            return redirect()->route("$mediaType.index");
            
        } catch (PropertyMediaCreateException $e) {

            Log::error("$type delete error: {$e->getMessage()}");
            ToastMagic::error("Unable to delete $type");

            return back();
        }
    }
}
