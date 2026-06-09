<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function createProduct(array $data)
    {
        try {
            if(count($data) === 0){
                throw new \Exception("Missing payload", 500);
            }
            $product = Product::create($data);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
