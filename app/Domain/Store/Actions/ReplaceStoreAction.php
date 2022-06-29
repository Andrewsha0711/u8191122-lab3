<?php

namespace App\Domain\Store\Actions;

use App\Domain\Store\Models\Store;

class ReplaceStoreAction{
    public function execute($params): Store
    {
        $store = Store::find($params['id']);
        $store->fill($params);
        $store->save();
        return $store;
    }
}