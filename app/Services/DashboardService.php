<?php

namespace App\Services;

use App\Helpers\RepositoryHelper;
use Illuminate\Database\Eloquent\Collection;

class DashboardService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public RepositoryHelper $repositoryHelper)
    {
        //
    }

    public function getPropertyMetrics(): int
    {
      return $this->repositoryHelper->getTotalProperties();
    }

    public function getSellRequestMetrics(): int
    {
        return $this->repositoryHelper->getTotalPendingSellRequests();
    }

    public function getBuyRequestMetrics(): int
    {
        return $this->repositoryHelper->getTotalPendingBuyRequests();
    }

    public function getRecentRequests()
    {
        return $this->repositoryHelper->getRecentRequests();
    }

    public function getActivityLogs(): Collection
    {
        return $this->repositoryHelper->getActivityLogs();
    }
}
