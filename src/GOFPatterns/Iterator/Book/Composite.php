<?php

namespace GOFPatterns\Iterator\Book;

use GOFPatterns\Composite\Book\Composite as BaseComposite;

class Composite extends BaseComposite implements AggregateInterface
{
    private $name;

    public function __construct($name)
    {
        parent::__construct();

        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function count()
    {
        return $this->children->count();
    }

    public function createIterator()
    {
        return new ConcreteIterator($this);
    }
}