<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotographsRequest;
use App\Models\Photograph;
use App\Services\PhotographService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhotographController extends Controller
{

    public function __construct(public PhotographService $photographService) {}
    /**
     * Display a listing of the resource.
     * Get data for admin dashboard
     */
    public function index(Request $request)
    {
        $photographs = $this->photographService->getPhotographs(request: $request);

        return view('admin.photographs.index', compact('photographs'));
    }


    public function showPhotographs()
    {
        return view('pages.photographs');
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
    public function store(StorePhotographsRequest $request)
    {
        try {
            $this->photographService->handlePhotographUploads(request: $request);

            ToastMagic::success("Photograph uploaded successfully");

            return back();
        } catch (Exception $e) {

            Log::error("Error occured during Photograph store process: {$e->getMessage()}");

            ToastMagic::error("An error occured while saving photographs");

            return back();
        }
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
