<?php

namespace App\Repositories;

use App\Models\Store;
use App\Repositories\Bases\BaseRepository;

class StoreRepository extends BaseRepository
{
    public function model(): string
    {
        return Store::class;
    }
}
