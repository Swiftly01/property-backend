<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(public DashboardService $dashboardService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertyCount = $this->dashboardService->getPropertyMetrics();
        $contactCount = $this->dashboardService->getContactCount();
        $pendingSellRequestsCount = $this->dashboardService->getSellRequestMetrics();
        $pendingBuyRequestsCount = $this->dashboardService->getBuyRequestMetrics();
        $recentRequests = $this->dashboardService->getRecentRequests();
        $activityLogs = $this->dashboardService->getActivityLogs();


        return view('admin.dashboard', compact('propertyCount', 'pendingSellRequestsCount', 'pendingBuyRequestsCount', 'recentRequests', 'activityLogs', 'contactCount'));
    }

    public function showSettings(Request $request)
    {
        $user =  $request->user();
        return view('admin.settings', compact('user'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
