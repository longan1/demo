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


    public function fillterStore($userId, $keyword, $perPage) {
        

        $query = $this->model->query();

        $query->whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        });
        
        if(!empty($keyword))
        {
            $query->where('store_name', 'like', '%'.$keyword.'%');
        }

        return $query->paginate($perPage);
    }
}
