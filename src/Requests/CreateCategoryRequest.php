<?php

namespace Pavlyshyn\Product\Requests;

use Pavlyshyn\Product\Requests\ApiRequest;

class CreateCategoryRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'сategory' => 'array|required',
            'сategory.name' => 'required|string|max:255'
        ];
    }

    public function attributes() {
        return [
            
        ];
    }

}
