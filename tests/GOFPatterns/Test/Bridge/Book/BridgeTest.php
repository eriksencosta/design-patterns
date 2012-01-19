<?php

namespace GOFPatterns\Test\Bridge\Book;

use GOFPatterns\Bridge\Book;
use PHPUnit_Framework_TestCase;

class BridgeTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $implementor = $this->getMock('GOFPatterns\Bridge\Book\ConcreteImplementorA');
        $implementor
            ->expects($this->once())
            ->method('operationImpl')
        ;

        // "Creating the right Implementor object".
        $abstraction = new Book\ConcreteAbstraction($implementor);
        $abstraction->operation();
    }
}