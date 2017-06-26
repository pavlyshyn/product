<?php

namespace Pavlyshyn\Product\Requests;

use Pavlyshyn\Product\Requests\ApiRequest;

class CreateAttributeRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'attribute' => 'array|required',
            'attribute.category_id' => 'required|integer',
            'attribute.name' => 'required|string|max:255'
        ];
    }

    public function attributes() {
        return [
            
        ];
    }

}
