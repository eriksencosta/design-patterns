<?php

namespace GOFPatterns\Iterator\Book;

class ConcreteAggregate implements AggregateInterface
{
    private $elements;

    public function __construct(array $elements = array())
    {
        $this->elements = $elements;
    }

    public function count()
    {
        return count($this->elements);
    }

    public function add($element)
    {
        $this->elements[] = $element;
        return true;
    }

    public function get($key)
    {
        return isset($this->elements[$key]) ?
            $this->elements[$key] : null;
    }

    public function createIterator()
    {
        return new ConcreteIterator($this);
    }
}