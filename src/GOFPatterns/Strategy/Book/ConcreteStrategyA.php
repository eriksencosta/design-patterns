<?php

namespace GOFPatterns\Strategy\Book;

class ConcreteStrategyA extends Strategy
{
    public function algorithm(Context $context)
    {
        $someValue = $context->getValue();
        $someValue = null === $someValue ? '' : ' ('.$someValue.')';

        return 'A'.$someValue;
    }
}