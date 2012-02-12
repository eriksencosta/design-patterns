<?php

namespace GOFPatterns\Builder\Book;

class ConcreteBuilderA extends AbstractBuilder
{
    /**
     * "Assembly and construction interface." a key design issue concerns the model for the construction and assembly
     * process. A model where the results of construction requests are simply appended to the product is usually
     * sufficient. (implementation)
     */
    private $product;

    public function buildProduct()
    {
        $this->product = new ProductA();

        return $this;
    }

    public function buildPart()
    {
        $this->product->setPart(new Part('A'));

        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }
}