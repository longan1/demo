<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository,
        private UserRepository $userRepository
    ) {
    }

    public function getProducts($userId, $params){
        $limit = 10;
        $keyword = '';
        $user = $this->userRepository->find($userId);
        $products = $user->load(['products' => function ($query) {
            $query->where('price', '>', 50)->paginate($limit);
        }])->products;
        return $products;
    }

}
