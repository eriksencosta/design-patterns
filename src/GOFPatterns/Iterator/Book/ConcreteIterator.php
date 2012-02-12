<?php

namespace GOFPatterns\Iterator\Book;

use GOFPatterns\Exception\IndexOutOfBoundsException;

class ConcreteIterator implements IteratorInterface
{
    private $aggregate;
    private $current;

    public function __construct(AggregateInterface $aggregate)
    {
        $this->aggregate = $aggregate;
        $this->current = 0;
    }

    public function first()
    {
        $this->current = 0;
    }

    public function next()
    {
        ++$this->current;
    }

    public function isDone()
    {
        return $this->current >= $this->aggregate->count();
    }

    public function currentItem()
    {
        if ($this->isDone()) {
            throw new IndexOutOfBoundsException();
        }

        return $this->aggregate->get($this->current);
    }
}