<?php

namespace App\Http\Controllers;

use App\Exceptions\MediaProcessingException;
use App\Exceptions\PhotographUpdateException;
use App\Http\Requests\StorePhotographsRequest;
use App\Http\Requests\UpdatePhotographRequest;
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
            $this->photographService->handleCreatePhotograph(request: $request);
            ToastMagic::success("Photograph uploaded successfully");

            return back();
        } catch (MediaProcessingException $e) {

            Log::error("Media upload failed {$e->getMessage()}");
            ToastMagic::error('Image upload failed');
        } catch (PhotographUpdateException $e) {

            Log::error("Update failed {$e->getMessage()}");
            ToastMagic::error('Unable to update photograph');
        }

        return back();
    }

    /**
     * Display the specified resource.
     */

    public function show(Photograph $photograph)
    {
        return view('admin.photographs.show', compact('photograph'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Photograph $photograph)
    {
        return view('admin.photographs.edit', compact('photograph'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotographRequest $request, Photograph $photograph)
    {
        try {
            $updated = $this->photographService->handleUpdatePhotograph(request: $request, photograph: $photograph);

            ToastMagic::success('Photograph data updated successfully');

            return back();
        } catch (MediaProcessingException $e) {

            Log::error("Media upload failed {$e->getMessage()}");
            ToastMagic::error('Image upload failed');
        } catch (PhotographUpdateException $e) {

            Log::error("Update failed {$e->getMessage()}");
            ToastMagic::error('Unable to update photograph');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photograph $photograph)
    {
        try {

            $this->photographService->handleDeletePhotograph(photograph: $photograph);
            ToastMagic::success('Photograph data deleted successfully');

            return back();
        } catch (Exception $e) {
            
            Log::error("photograph delete error: {$e->getMessage()}");
            ToastMagic::error('Unable to delete photograph');
        }
    }
}
