<?php

namespace App\Http\ApiV1\Modules\Product\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeleteProductRequest extends FormRequest
{
    protected function prepareForValidation(){
        $this->merge(['id' => $this->route('id')]);
    }

    public function rules(): array
    {
        return [
            'id' => 'integer|required|exists:products,id',
        ];
    }

    // используется response из Handler.php

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'data'=>[],
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