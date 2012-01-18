<?php

namespace GOFPatterns\Test\Strategy\Book;

use GOFPatterns\Strategy\Book;
use PHPUnit_Framework_TestCase;

class StrategyTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $context = new Book\Context();

        $context->calculateNewValue();
        $this->assertEquals('A', $context->getValue());

        $context->setValue(1);
        $context->calculateNewValue();
        $this->assertEquals('A (1)', $context->getValue());

        $context = new Book\Context(new Book\ConcreteStrategyB());

        $context->calculateNewValue();
        $this->assertEquals('B', $context->getValue());

        $context->setValue(2);
        $context->calculateNewValue();
        $this->assertEquals('B', $context->getValue());
    }
}