<?php

namespace App\Domain\Store\Actions;

use App\Domain\Store\Models\Store;

class GetStoresAction{
    public function execute($limit, $offset){
        if($offset == null){
            $offset = 0;
        }
        if($limit == null){
            return Store::skip($offset)->get();
        }
        else{
            return Store::skip($offset)->take($limit)->get();
        } 
    }
}