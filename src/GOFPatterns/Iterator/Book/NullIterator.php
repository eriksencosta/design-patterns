<?php

namespace GOFPatterns\Iterator\Book;

use RuntimeException;

class NullIterator implements IteratorInterface
{
    public function first()
    {
    }

    public function next()
    {
    }

    public function isDone()
    {
        return true;
    }

    public function currentItem()
    {
        throw new RuntimeException('NullIterator does not have state to return for currentItem() method call.');
    }
}