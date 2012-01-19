<?php

namespace GOFPatterns\AbstractFactory\Book\FamilyB;

use GOFPatterns\AbstractFactory\Book\AbstractProduct;

class Product extends AbstractProduct
{
    public function operation()
    {
        // do something.
    }

    public function differentOperation($value)
    {
        return $value;
        // do something.
    }
}