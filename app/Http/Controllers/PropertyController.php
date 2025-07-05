<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('admin.properties.index');
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
        return view('admin.properties.create');
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
   // public function show(Property $property)
    public function show()
    {
         return view('admin.properties.show');
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
