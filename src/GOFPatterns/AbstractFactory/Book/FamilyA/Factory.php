<?php

namespace GOFPatterns\AbstractFactory\Book\FamilyA;

use GOFPatterns\AbstractFactory\Book\AbstractFactory;

class Factory extends AbstractFactory
{
    public function createProduct()
    {
        return new Product();
    }
}