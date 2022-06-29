<?php

namespace App\Http\ApiV1\Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'actual_price' => $this->actual_price,
            'discount' => $this->discount,
            'store_id' => $this->store_id,
        ];
    }
}