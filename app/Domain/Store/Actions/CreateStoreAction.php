<?php

namespace App\Domain\Store\Actions;

use App\Domain\Store\Models\Store;

class CreateStoreAction{
    public function execute($params): Store
    {
        $store = new Store;
        $store->fill($params);
        $store->save();
        return $store;
    }
}