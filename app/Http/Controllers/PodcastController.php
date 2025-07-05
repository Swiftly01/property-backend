<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.podcasts.index');
    }

    public function showPodcasts()
    {
        return view('pages.podcasts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.podcasts.create');
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
    // public function show(Podcast $podcast)
     public function show()
    {
        return view('admin.podcasts.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit()
   // public function edit(Podcast $podcast)
    {
        return view('admin.podcasts.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Podcast $podcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Podcast $podcast)
    {
        //
    }
}
