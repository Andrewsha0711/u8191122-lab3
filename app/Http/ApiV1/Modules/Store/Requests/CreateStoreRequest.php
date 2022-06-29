<?php

namespace App\Http\ApiV1\Modules\Store\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'short_description' => 'string|required',
            'description' => 'string',
            'seller' => 'string|required',
        ];
    }
}