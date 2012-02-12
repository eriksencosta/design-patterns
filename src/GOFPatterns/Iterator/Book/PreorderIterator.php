<?php

namespace GOFPatterns\Iterator\Book;

use GOFPatterns\Exception\IndexOutOfBoundsException;
use SplStack;

class PreorderIterator implements IteratorInterface
{
    private $root;

    public function __construct(AggregateInterface $root)
    {
        $this->root = $root;
        $this->iterators = new SplStack();
    }

    public function first()
    {
        $iterator = $this->root->createIterator();

        if (!$iterator instanceof NullIterator) {
            $iterator->first();

            $this->iterators = new SplStack();
            $this->iterators[] = $iterator;
        }
    }

    public function next()
    {
        $top = $this->iterators->top();
        $currentItem = $top->currentItem();
        $iterator = $currentItem->createIterator();

        $iterator->first();
        $this->iterators[] = $iterator;

        $i = 1;
        while ($this->iterators->count() > 0 && $this->iterators->top()->isDone()) {
            $this->iterators->pop(); // unset

            if (0 === $this->iterators->count()) {
                continue;
            }

            // print $this->iterators->top()->currentItem()->getName() . PHP_EOL;
            $this->iterators->top()->next();
        }
    }

    public function isDone()
    {
        return 0 === $this->iterators->count();
    }

    public function currentItem()
    {
        return 0 < $this->iterators->count() ?
            $this->iterators->top()->currentItem() :
            null;
    }
}