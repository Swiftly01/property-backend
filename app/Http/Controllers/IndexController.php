<?php

namespace App\Http\Controllers;

use App\Services\PropertyService;
use Illuminate\Http\Request;

class IndexController extends Controller
{  
    public function __construct(public PropertyService $propertyService)
    {
        
    }

    public function index(Request $request)
    {   
        $properties = $this->propertyService->getProperties(request:$request);

         return view('index', compact('properties'));
    }
}
