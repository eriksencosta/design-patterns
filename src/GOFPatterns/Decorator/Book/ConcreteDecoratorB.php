<?php

namespace GOFPatterns\Decorator\Book;

class ConcreteDecoratorB extends Decorator
{
    private $value;

    public function __construct(ComponentInterface $component, $value = 1)
    {
        parent::__construct($component);

        $this->value = $value;
    }

    public function operation()
    {
        parent::operation();

        // do something.
    }
}