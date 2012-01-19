<?php

namespace GOFPatterns\Decorator\Book;

class ConcreteDecoratorA extends Decorator
{
    public function operation()
    {
        parent::operation();
        $this->addedBehavior();
    }

    public function addedBehavior()
    {
        // do something.
    }
}