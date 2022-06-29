<?php

namespace App\Domain\Store\Actions;

use App\Domain\Store\Models\Store;

class PatchStoreAction{
    public function execute($params): Store
    {
        $store = Store::find($params['id']);
        $store->patch($params);
        $store->save();
        return $store;
    }
}