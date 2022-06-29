<?php

namespace App\Domain\Product\Actions;

use App\Domain\Product\Models\Product;

class ReplaceProductAction{
    public function execute($params): Product
    {
        $product = Product::find($params['id']);
        $product->fill($params);
        $product->save();
        return $product;
    }
}