<?php

namespace App\Http\ApiV1\Modules\Store\Controllers;

use App\Domain\Store\Actions\CreateStoreAction;
use App\Domain\Store\Actions\DeleteStoreAction;
use App\Domain\Store\Actions\GetStoreAction;
use App\Domain\Store\Actions\GetStoresAction;
use App\Domain\Store\Actions\PatchStoreAction;
use App\Domain\Store\Actions\ReplaceStoreAction;
use App\Domain\Store\Models\Store;
use App\Http\ApiV1\Modules\Store\Requests\CreateStoreRequest;
use App\Http\ApiV1\Modules\Store\Requests\DeleteStoreRequest;
use App\Http\ApiV1\Modules\Store\Requests\PatchStoreRequest;
use App\Http\ApiV1\Modules\Store\Requests\ReplaceStoreRequest;
use App\Http\ApiV1\Modules\Store\Resources\StoreResource;
use App\Http\ApiV1\Modules\Store\Resources\StoresResource;
use App\Http\ApiV1\Modules\Store\Resources\StoreWithProductsResource;
use Illuminate\Http\Request;

class StoreController{

    public function getStore(Request $request, GetStoreAction $action){
        $request->merge(['id' => $request->route('id')]);
        $validated = $request->validate([
            'id' => 'integer|required|exists:stores,id',
        ]);
        return (new StoreWithProductsResource($action->execute($validated['id'])))
            ->additional(['errors' => [], 'meta' => []])
                ->response()
                    ->setStatusCode(200);
    }

    public function getStores(Request $request, GetStoresAction $action){
        $request->merge(['count' => count(Store::all())]);
        $validated = $request->validate([
            'limit' => 'integer|between:0,100',
            'offset' => 'integer|lt:count',
        ]);
        $stores = $action->execute($validated['limit'] ?? null, 
                                $validated['offset'] ?? 0);
        return (new StoresResource($stores))
            ->additional(['errors' => [], 'meta' => []])
                ->response()
                    ->setStatusCode(200);
    }

    public function createStore(CreateStoreRequest $request, CreateStoreAction $action){
        $body = $request->validated();
        return (new StoreResource($action->execute($body)))
            ->additional(['errors' => [], 'meta' => []])
                ->response()
                    ->setStatusCode(200);
    }
    
    public function deleteStore(DeleteStoreRequest $request, DeleteStoreAction $action){
        $body = $request->validated();
        $action->execute($body['id']);
        return response()->json([
            'data' => '',
            'errors' => '',
            'meta' => [
                'message' => 'deleted'
            ]
        ], 200);
    }

    public function replaceStore(ReplaceStoreRequest $request, 
                        ReplaceStoreAction $action){
        $body = $request->validated();
        return (new StoreResource($action->execute($body)))
            ->additional(['errors' => [], 'meta' => []])
                ->response()
                    ->setStatusCode(200);
    }

    public function patchStore(PatchStoreRequest $request, 
                        PatchStoreAction $action){
        $body = $request->validated();
        return (new StoreResource($action->execute($body)))
            ->additional(['errors' => [], 'meta' => []])
                ->response()
                    ->setStatusCode(200);
    }
}