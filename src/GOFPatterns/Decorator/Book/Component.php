<?php

namespace GOFPatterns\Decorator\Book;

class Component implements ComponentInterface
{
    /**
     * "Interface conformance". A decorator object's interface must conform to the interface of the component it
     * decorates. ConcreteDecorator classes must therefore inherit from a common class (implementation)
     */
    public function operation()
    {
        // do something.
    }
}