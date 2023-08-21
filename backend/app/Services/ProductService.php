<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }
    public function fillterProduct($userId, $params) {
        $keyword = '';
        $limit = 10;
        $minPrice = 0;
        $maxPrice = 0;

        if(isset($params['keyword']))
        {
            $keyword = $params['keyword'];
        }

        if(isset($params['limit']))
        {
            $limit = $params['limit'];
        }

        if(isset($params['min_price']) && isset($params['max_price']))
        {
            $minPrice = $params['min_price'];
            $maxPrice = $params['max_price'];
        }
        return $this->productRepository->fillterProduct($userId,$minPrice,$maxPrice,$keyword,$limit);
    }

    public function create($input)
    {
        return $this->productRepository->create($input);
    }

    public function update($product,$input)
    {
        return $this->productRepository->update($product,$input);
    }

    public function delete($product)
    {
        return $this->productRepository->delete($product);
    }

    public function getProductById($id)
    {
        return $this->productRepository->find($id);
    }


}
