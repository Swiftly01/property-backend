<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Services\PropertyService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PropertyController extends Controller
{
    public function __construct(
        public PropertyService $propertyService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $properties = $this->propertyService->getProperties(request: $request);

        return view('admin.properties.index', compact('properties'));
    }

    public function showProperty(Request $request)
    {
        $properties = $this->propertyService->getProperties(request: $request);

        return view('pages.properties.index', compact('properties'));
    }


    public function showPropertyDetails(Property $property)
    {
        return view('pages.properties.show', compact('property'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location =  $this->propertyService->mapStateToArray();

        $pendingSellRequests = $this->propertyService->getPendingSellRequests();

        return view('admin.properties.create', compact('location', 'pendingSellRequests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {

        try {

            $this->propertyService->handleStoreProperty(request: $request);

            ToastMagic::success('Property uploaded successfully');

            return back();
        } catch (Exception $e) {

            Log::error("Error during property store process: {$e->getMessage()}");

            ToastMagic::error('An error occured while saving property!');

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $location =  $this->propertyService->mapStateToArray();

        // if ($location->isEmpty()) {
        //     ToastMagic::error('No location data available.');
        // }
        return view('admin.properties.edit', compact('property', 'location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        try {

            $this->propertyService->handleUpdateProperty(request: $request, property: $property);

            ToastMagic::success('Property updated successfully');

            return back();
        } catch (Exception $e) {

            Log::error("Error during property update {$e->getMessage()}");

            ToastMagic::error('Unable to update property');

            return back();
        }
    }

    public function destroyThumbnail(Property $property)
    {
        try {
            $isDeleted = $this->propertyService->handleDeleteThumbnail(property: $property);

            if (!$isDeleted) {

                ToastMagic::error('Unable to delete thumbnail!!');

                return back();
            }

            ToastMagic::success('Property thumbnail deleted successfully');

            return back();
        } catch (Exception $e) {

            Log::error("Error during thumbnail delete process {$e->getMessage()}");

            ToastMagic::error('Unable to delete thumbnail!!');

            return back();
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {

        try {
            $isDeleted =  $this->propertyService->handlePropertyDelete(property: $property);

            if (!$isDeleted) {

                ToastMagic::error('Unable to delete property!!');

                return back();
            }

            ToastMagic::success('Property  deleted successfully');

            return redirect()->route('properties.index');
        } catch (Exception $e) {

            Log::error("Error during property delete process {$e->getMessage()}");

            ToastMagic::error('Unable to delete property!!');

            return back();
        }
    }
}
