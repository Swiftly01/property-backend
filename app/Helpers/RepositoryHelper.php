<?php

namespace App\Helpers;

use App\Repositories\SellRequestRepository;

class RepositoryHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct(public SellRequestRepository $sellRequestRepository) {}

    public function updateSellRequestStatus(object $request): ?bool
    {
        return $this->sellRequestRepository->updateSellRequestStatus(request: $request);
    }

   
    public function getPendingSellRequests()
    {
        return $this->sellRequestRepository->getPendingSellRequests();
    }


}
