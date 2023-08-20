<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Bases\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ProductRepository extends BaseRepository
{
    public function model(): string
    {
        return Product::class;
    }

}
