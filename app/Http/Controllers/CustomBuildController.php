<?php

namespace App\Http\Controllers;

use App\Models\CustomBuild;
use Illuminate\Http\Request;

class CustomBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.custom-build');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(CustomBuild $customBuild)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomBuild $customBuild)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomBuild $customBuild)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomBuild $customBuild)
    {
        //
    }
}
