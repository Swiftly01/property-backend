<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct(public ContactService $contactService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $contacts = $this->contactService->getContacts(request: $request);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function showContactPage()
    {
        return view('pages.contact');
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
    public function store(StoreContactRequest $request)
    {
        try{
            $this->contactService->handleStoreContact(request: $request);
            ToastMagic::success('Your data has been submitted successfully');

            return back();

        }catch(Exception $e){

            Log::error("Contact create error", ["error" => $e->getMessage()]);

            ToastMagic::error("Failed to submit data. Please try again later!!");

            return back();

        }
    }

    /**
     * Display the specified resource.
     */
    //public function show(Contact $contact)
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
