<?php

namespace App\Http\Controllers;

use App\Models\Photograph;
use Illuminate\Http\Request;

class PhotographController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.photographs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photographs.create');
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
     public function show()
    // public function show(Photograph $photography)
    {
       return view('admin.photographs.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit()
   // public function edit(Photograph $photography)
    {
         return view('admin.photographs.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photograph $photography)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photograph $photography)
    {
        //
    }
}
