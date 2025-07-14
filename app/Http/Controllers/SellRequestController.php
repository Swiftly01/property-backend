<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellRequest;
use App\Models\SellRequest;
use App\Services\SellRequestService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SellRequestController extends Controller
{
    public function __construct(public SellRequestService $sellRequestService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $sellRequests = $this->sellRequestService->getSellRequests(request: $request);

        return view('admin.sell-requests.index', compact('sellRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        return view('pages.properties.listing');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSellRequest $request)
    {
        try {

            $this->sellRequestService->processSellRequest(validatedData: $request->validated());
            ToastMagic::success('Your request has been sent successfully');
            return back();

        } catch (Exception $e) {
            
            Log::error(message: "An error occured while storing sell request {$e->getMessage()}");
            ToastMagic::error('An error occured while processing your request');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SellRequest $sellRequest)
    {
        return view('admin.sell-requests.show', compact('sellRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SellRequest $sellRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SellRequest $sellRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SellRequest $sellRequest)
    {
        //
    }
}
