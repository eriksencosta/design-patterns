<?php

namespace GOFPatterns\Test\Decorator\Book;

use GOFPatterns\Decorator\Book;
use PHPUnit_Framework_TestCase;

class DecoratorTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $component = new Book\Component();

        // Decorated component.
        $decoratedComponent = $this->getMock(
            'GOFPatterns\Decorator\Book\ConcreteDecoratorA',
            array('addedBehavior'),
            array($component)
        );

        $decoratedComponent
            ->expects($this->exactly(2))
            ->method('addedBehavior')
        ;

        $decoratedComponent->operation();

        // Decorated component with A and B.
        $decoratedComponentB = new Book\ConcreteDecoratorB($decoratedComponent, 2);
        $decoratedComponentB->operation();
    }
}