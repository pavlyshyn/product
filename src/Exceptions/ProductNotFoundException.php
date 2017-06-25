<?php

namespace Pavlyshyn\Product\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductNotFoundException extends NotFoundHttpException {

    public function __construct() {
        parent::__construct('The product was not found.');
    }

}
