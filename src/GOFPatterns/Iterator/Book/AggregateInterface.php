<?php

namespace GOFPatterns\Iterator\Book;

interface AggregateInterface
{
    /**
     * Analogous to PHP's IteratorAggregate::getIterator().
     */
    function createIterator();
}