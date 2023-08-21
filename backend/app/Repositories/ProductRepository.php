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

    public function fillterProduct($userId, $minPrice, $maxPrice, $keyword, $perPage) {
        
        $this->makeModel();

        $query = $this->model->query();

        $query->whereHas('store.user', function ($query) use ($userId) {
            $query->where('id', $userId);
        });

        if(($minPrice > 0 && $maxPrice > 0 ) && $maxPrice > $minPrice)
        {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }
        
        if(!empty($keyword))
        {
            $query->where('name', 'like', '%'.$keyword.'%');
            $query->orWhere('detail', 'like', '%'.$keyword.'%');
        }

        return $query->paginate($perPage);
    }

}
