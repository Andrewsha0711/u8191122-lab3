<?php

namespace App\Domain\Product\Actions;

use App\Domain\Product\Models\Product;

class DeleteProductAction {
    public function execute(int $id): bool {
        if(($product = Product::find($id)) != null) {
            $product->images()->each(function($image){
                $image->delete();
            });
            $product->delete();
            return true;
        }
        return false;
    }
}