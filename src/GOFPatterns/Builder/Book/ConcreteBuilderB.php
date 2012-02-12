<?php

namespace GOFPatterns\Builder\Book;

class ConcreteBuilderB extends AbstractBuilder
{
    private $product;

    public function buildProduct()
    {
        $this->product = new ProductB('someValue');

        return $this;
    }

    public function buildPart()
    {
        $this->product->setPart(new Part('B'));

        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }
}