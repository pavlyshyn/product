<?php

namespace Pavlyshyn\Product\Repositories;

use Pavlyshyn\Product\Model\Product;
use Optimus\Genie\Repository;

class ProductRepository extends Repository {

    public function getModel() {
        return new Product();
    }

    public function create(array $data) {
        $product = $this->getModel();
        $product->fill($data);
        $product->save();
        return $product;
    }

    public function update(Product $product, array $data) {
        $product->fill($data);
        $product->save();
        return $product;
    }

}
