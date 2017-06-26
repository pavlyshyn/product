<?php

namespace Pavlyshyn\Product\Requests;

use Pavlyshyn\Product\Requests\ApiRequest;

class CreateProductRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'product' => 'array|required',
            'product.name' => 'required|string|max:255',
            'product.description' => 'string',
            'product.purchase' => 'regex:/^\d*(\.\d{1,2})?$/',
            'product.amount' => 'regex:/^\d*(\.\d{1,2})?$/',
            'product.discount' => 'regex:/^\d*(\.\d{1,2})?$/',
            'product.code' => 'string|max:255',
            'product.is_publish' => 'boolean'
        ];
    }

    public function attributes() {
        return [
            
        ];
    }

}
