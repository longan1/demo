<?php

namespace App\Services;

use App\Repositories\StoreRepository;

class StoreService
{
    public function __construct(
        private StoreRepository $storeRepository
    ) {
    }
}
