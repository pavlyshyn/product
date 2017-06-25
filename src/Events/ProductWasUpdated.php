<?php

namespace Pavlyshyn\Product\Events;

use Pavlyshyn\Product\Events\Event;
use Pavlyshyn\Product\Model\Product;

class ProductWasUpdated extends Event {

    public $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

}
