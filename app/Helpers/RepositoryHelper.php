<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use App\Repositories\ActivityLogRepository;
use App\Repositories\BuyRequestRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\SellRequestRepository;
use Illuminate\Database\Eloquent\Collection;

class RepositoryHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (private SellRequestRepository $sellRequestRepository,
     private PropertyRepository $propertyRepository,
     private BuyRequestRepository $buyRequestRepository,
     private ActivityLogRepository $activityLogRepository
    ) {}

    public function updateSellRequestStatus(object $request): ?bool
    {
        return $this->sellRequestRepository->updateSellRequestStatus(request: $request);
    }

   
    public function getPendingSellRequests()
    {
        return $this->sellRequestRepository->getPendingSellRequests();
    }

    public function getTotalProperties(): int
    {
        return $this->propertyRepository->getTotalProperties();
    }

    public function getTotalPendingSellRequests(): int
    {
        return $this->sellRequestRepository->getTotalPendingSellRequests();
    }

    public function getTotalPendingBuyRequests(): int
    {
        return $this->buyRequestRepository->getTotalPendingBuyRequests();
    }


    public function getRecentRequests()
    {
      $recentBuyRequests = $this->buyRequestRepository->getRecentBuyRequests();
      $recentSellRequests = $this->sellRequestRepository->getRecentSellRequests();
  
      return $recentSellRequests->merge($recentBuyRequests)->sortByDesc('created_at');


    }

    public function getActivityLogs(): Collection
    {
        return $this->activityLogRepository->getActivityLogs();
    }


}
