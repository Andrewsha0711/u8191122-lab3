<?php

namespace App\Domain\Store\Actions;

use App\Domain\Store\Models\Store;

class GetStoreAction{
    public function execute(int $id): Store{
        $store = Store::findOrFail($id);
        return $store;   
    }
}