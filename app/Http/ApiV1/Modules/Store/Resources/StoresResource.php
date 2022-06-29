<?php

namespace App\Http\ApiV1\Modules\Store\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoresResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'data' => StoreResource::collection($this),
        ];
    }
}