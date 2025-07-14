<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Collection;

class ActivityLogRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getActivityLogs(): Collection
    {
        return ActivityLog::latest()->take(3)->get();
    }
}
