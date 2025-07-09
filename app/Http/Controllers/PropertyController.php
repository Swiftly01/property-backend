<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use App\Services\PropertyService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    public function __construct(
        public AppHelper $appHelper,
        public PropertyService $propertyService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $properties = $this->propertyService->getAllProperties();

        return view('admin.properties.index', compact('properties'));
    }

    public function showProperty()
    {
        return view('pages.properties.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location =  $this->appHelper->mapStateToArray();

        if ($location->isEmpty()) {
            ToastMagic::error('No location data available.');
        }

        return view('admin.properties.create', compact('location'));
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
    // public function edit(Property $property)
    public function edit()
    {
        return view('admin.properties.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
