<?php

namespace GOFPatterns\Iterator\Book;

interface IteratorInterface
{
    /**
     * Analogous to PHP's Iterator::rewind().
     */
    function first();

    /**
     * Analogous to PHP's Iterator::next().
     */
    function next();

    /**
     * Analogous to PHP's Iterator::valid().
     */
    function isDone();

    /**
     * Analogous to PHP's Iterator::current().
     */
    function currentItem();

    /**
     * The PHP's iterator interface have a key() method that returns the key of the current element.
     */
    //function key();
}