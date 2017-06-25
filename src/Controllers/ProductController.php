<?php

namespace Pavlyshyn\Product\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Pavlyshyn\Product\Requests\CreateProductRequest;
use Pavlyshyn\Product\Services\ProductService;

class ProductController extends Controller {

    private $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function getAll() {
        $resourceOptions = $this->parseResourceOptions();
        $data = $this->productService->getAll($resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions, 'products');

        return $this->response($parsedData);
    }

    public function getById($productId) {
        $resourceOptions = $this->parseResourceOptions();
        $data = $this->productService->getById($productId, $resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions, 'product');

        return $this->response($parsedData);
    }

    public function create(CreateProductRequest $request) {
        $data = $request->get('product', []);

        return $this->response($this->productService->create($data), 201);
    }

    public function update($productId, Request $request) {
        $data = $request->get('product', []);

        return $this->response($this->productService->update($productId, $data));
    }

    public function delete($productId) {
        return $this->response($this->productService->delete($productId));
    }

}
