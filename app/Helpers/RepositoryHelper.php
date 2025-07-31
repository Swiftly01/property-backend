<?php

namespace App\Helpers;

use App\Interfaces\BuyRequestInterface;
use App\Interfaces\ContactFormInterface;
use App\Interfaces\PropertyInterface;
use App\Interfaces\SellRequestInterface;
use App\Repositories\ActivityLogRepository;
use App\Repositories\BuyRequestRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\SellRequestRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RepositoryHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (private SellRequestInterface $sellRequestInterface,
     private PropertyInterface $propertyInterface,
     private BuyRequestInterface $buyRequestInterface,
     private ActivityLogRepository $activityLogRepository,
     private ContactFormInterface $contactFormInterface
    ) {}

    public function updateSellRequestStatus(object $request): ?bool
    {
        return $this->sellRequestInterface->updateSellRequestStatus(request: $request);
    }

   
    public function getPendingSellRequests()
    {
        return $this->sellRequestInterface->getPendingSellRequests();
    }

    public function getAllProperties(): Collection
    {
        return $this->propertyInterface->getAllProperties();
    }

    public function getTotalContactCount(): int
    {
        return $this->contactFormInterface->getTotalContactCount();
    }

    public function getTotalProperties(): int
    {
        return $this->propertyInterface->getTotalProperties();
    }

    public function getTotalPendingSellRequests(): int
    {
        return $this->sellRequestInterface->getTotalPendingSellRequests();
    }

    public function getTotalPendingBuyRequests(): int
    {
        return $this->buyRequestInterface->getTotalPendingBuyRequests();
    }


    public function getRecentRequests()
    {
      $recentBuyRequests = $this->buyRequestInterface->getRecentBuyRequests();
      $recentSellRequests = $this->sellRequestInterface->getRecentSellRequests();
  
      return $recentSellRequests->merge($recentBuyRequests)->sortByDesc('created_at');


    }

    public function getActivityLogs(): Collection
    {
        return $this->activityLogRepository->getActivityLogs();
    }

    public function handleDeleteThumbnail(Model $model)
    {
         $thumbnail = $model->getFirstMedia('thumbnail');

        if ($thumbnail === null) {
            return false;
        }

        $thumbnail->delete();
        return true;
    }


}
