<?php

namespace GOFPatterns\FactoryMethod\Book;

class Creator extends AbstractCreator
{
    public function createProduct()
    {
        return new Product();
    }
}