<?php

namespace App\Services;

use App\Repositories\StoreRepository;
use Illuminate\Support\Facades\Auth;

class StoreService
{
    public function __construct(
        private StoreRepository $storeRepository
    ) {
    }

    public function fillterStore($userId, $params)
    {
        $keyword = '';
        $limit = 10;

        if (isset($params['keyword'])) {
            $keyword = $params['keyword'];
        }

        if (isset($params['limit'])) {
            $limit = $params['limit'];
        }

        return $this->storeRepository->fillterStore($userId, $keyword, $limit);
    }

    public function create($input)
    {
        $user = Auth::user();
        $input['user_id'] = $user->id;
        return $this->storeRepository->create($input);
    }

    public function update($store, $input)
    {
        return $this->storeRepository->update($store, $input);
    }

    public function delete($store)
    {
        return $this->storeRepository->delete($store);
    }

    public function getStoreById($id)
    {
        return $this->storeRepository->find($id);
    }
}
