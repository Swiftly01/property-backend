<?php

namespace App\Http\Controllers;

use App\Enums\BuyRequestEnum;
use App\Http\Requests\StoreBuyRequest;
use App\Models\BuyRequest;
use App\Services\BuyRequestService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class BuyRequestController extends Controller
{
    public function __construct(public BuyRequestService $buyRequestService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buyRequests = $this->buyRequestService->getAllRequests();

        return view('admin.buy-requests.index', compact('buyRequests'));
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
    public function store(StoreBuyRequest $request)
    {
        try {

            $this->buyRequestService->handleStoreRequest(validatedData: $request->validated());
            ToastMagic::success('Buy request submitted successfully');
            return back();
        } catch (Throwable $th) {

            Log::error(message: "Error during buy request store process {$th->getMessage()}");
            ToastMagic::error('Unable to store buy request');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BuyRequest $buyRequest)
    {
        $buyRequest->load('property');
        return view('admin.buy-requests.show', compact('buyRequest'));
    }


    public function handleStatusUpdate(BuyRequest $buyRequest, string $action)
    {
        if (!BuyRequestEnum::tryFrom($action)) {
            abort(400, 'Invalid action');
        }

        try {

            $this->buyRequestService->handleStatusUpdate(buyRequest: $buyRequest, action: $action);
            ToastMagic::success('Buy request status updated successfully');
            return back();

        } catch (Exception $e) {
            
            Log::error(message: "Error during status update: {$e->getMessage()}");
            ToastMagic::error('Unable to update Booking status');

            return back();
        }
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
    public function update(BuyRequest $buyRequest) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyRequest $buyRequest)
    {
        //
    }
}
