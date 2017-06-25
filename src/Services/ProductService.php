<?php

namespace Pavlyshyn\Product\Services;

use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use Pavlyshyn\Product\Exceptions\ProductNotFoundException;
use Pavlyshyn\Product\Events\ProductWasCreated;
use Pavlyshyn\Product\Events\ProductWasDeleted;
use Pavlyshyn\Product\Events\ProductWasUpdated;
use Pavlyshyn\Product\Repositories\ProductRepository;

class ProductService {

    private $auth;
    private $database;
    private $dispatcher;
    private $productRepository;

    public function __construct(
            AuthManager $auth,
            DatabaseManager $database,
            Dispatcher $dispatcher,
            ProductRepository $productRepository
    ) {
        $this->auth = $auth;
        $this->database = $database;
        $this->dispatcher = $dispatcher;
        $this->productRepository = $productRepository;
    }

    public function getAll($options = []) {
        return $this->productRepository->get($options);
    }

    public function getById($productId, array $options = []) {
        $product = $this->getRequestedProduct($productId);
        return $product;
    }

    public function create($data) {
        $product = $this->productRepository->create($data);
        $this->dispatcher->fire(new ProductWasCreated($product));
        return $product;
    }

    public function update($productId, array $data) {
        $product = $this->getRequestedProduct($productId);
        $this->productRepository->update($product, $data);
        $this->dispatcher->fire(new ProductWasUpdated($product));
        return $product;
    }

    public function delete($productId) {
        $product = $this->getRequestedProduct($productId);
        $this->productRepository->delete($productId);
        $this->dispatcher->fire(new ProductWasDeleted($product));
    }

    private function getRequestedProduct($productId) {
        $product = $this->productRepository->getById($productId);
        if (is_null($product)) {
            throw new ProductNotFoundException();
        }
        return $product;
    }

}
