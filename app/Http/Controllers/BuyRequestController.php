<?php

namespace App\Http\Controllers;

use App\Models\BuyRequest;
use Illuminate\Http\Request;

class BuyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.buy-requests.index');
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
    // public function show(BuyRequest $buyRequest)
     public function show()
    {
        return view('admin.buy-requests.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuyRequest $buyRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuyRequest $buyRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyRequest $buyRequest)
    {
        //
    }
}
