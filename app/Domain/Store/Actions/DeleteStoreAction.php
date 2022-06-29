<?php

namespace App\Domain\Store\Actions;

use App\Domain\Store\Models\Store;

class DeleteStoreAction {
    public function execute(int $id): bool {
        if(($store = Store::find($id)) != null) {
            $store->products()->each(function($product){
                $product->images()->each(function($image){
                    $image->delete();
                });
                $product->delete();
            });
            $store->delete();
            return true;
        }
        return false;
    }
}