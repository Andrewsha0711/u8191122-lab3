<?php

namespace App\Http\ApiV1\Modules\Product\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReplaceProductRequest extends FormRequest
{
    protected function prepareForValidation(){
        $this->merge(['id' => $this->route('id')]);
    }
    public function rules(): array
    {
        return [
            'id' => 'integer|required|exists:products,id',
            'name' => 'string|required',
            'short_description' => 'string|required',
            'description' => 'string',
            'actual_price' => 'numeric|required',
            'discount' => 'numeric|between:0,99.9',
            'store_id' => 'integer|required|exists:stores,id',
        ];
    }

    // используется response из Handler.php
    
    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'data'=> null,
    //         'errors' => [
    //             'code' => 'ValidationError',
    //             'message' => [
    //                 $validator->errors()
    //             ],
    //         'meta' => []
    //         ]
    //     ], 400));
    // }
}