<?php

namespace Pavlyshyn\Product\Events;

use Infrastructure\Events\Event;
use Pavlyshyn\Product\Model\Product;

class ProductWasDeleted extends Event {

    public $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

}