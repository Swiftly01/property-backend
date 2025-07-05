<?php

namespace App\Http\Controllers;

use App\Models\Staging;
use Illuminate\Http\Request;

class StagingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.staging.index');
    }

    public function showStaging()
    {
        return view('pages.staging.index');
    }

    public function showStagingDetails()
    {
        return view('pages.staging.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staging.create');
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
   // public function show(Staging $staging)
   public function show()
    {
        return view('admin.staging.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Staging $staging)
     public function edit()
    {
        return view('admin.staging.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staging $staging)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staging $staging)
    {
        //
    }
}
