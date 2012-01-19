<?php

namespace GOFPatterns\Bridge\Book;

class ConcreteAbstraction extends Abstraction
{
    public function operation()
    {
        $this->implementor->operationImpl();
        // do something.
    }
}