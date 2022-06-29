<?php

namespace App\Domain\Product\Actions;

use App\Domain\Product\Models\Product;

class PatchProductAction{
    public function execute($params): Product
    {
        $product = Product::find($params['id']);
        $product->patch($params);
        $product->save();
        return $product;
    }
}