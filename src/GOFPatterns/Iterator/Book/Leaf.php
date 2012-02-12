<?php

namespace GOFPatterns\Iterator\Book;

use GOFPatterns\Composite\Book\Leaf as BaseLeaf;

class Leaf extends BaseLeaf implements AggregateInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function createIterator()
    {
        return new NullIterator();
    }
}