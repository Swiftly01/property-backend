<?php

namespace App\Helpers;

use App\Events\ActivityLogged;
use App\Models\SellRequest;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AppHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public  function fetchStates()
    {

        try {

            $response = Http::get('https://temikeezy.github.io/nigeria-geojson-data/data/full.json');

            if ($response->successful()) {
                return $response->json();
            }
        } catch (Exception $e) {

            Log::error(message: "States fetching error:  {$e->getMessage()}");

            return null;
        }
    }


    public  function mapStateToArray()
    {
        $statesObject = $this->fetchStates();

        $location = collect($statesObject)->mapWithKeys(function ($item) {
            $name = $item['state'];
            $key = strtolower($name);
            $label = $name;

            return [$key => $label];
        });

        return $location;
    }


    public function dispatchActivityEvent(string $type, string $actionMessage, ?string $performedBy = null)
    {
        event(new ActivityLogged(
            action: $actionMessage,
            type: $type,
            performedBy: $performedBy ?? auth()->user()?->name ?? 'System',

        ));
    }
}
