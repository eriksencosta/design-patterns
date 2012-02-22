<?php

namespace GOFPatterns\Test\ChainOfResponsibility\Book;

use GOFPatterns\ChainOfResponsibility\Book;
use PHPUnit_Framework_TestCase;

class ChainOfResponsibilityTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        // B handles the request, then it does not forward to A.
        $handlerA = new Book\ConcreteHandlerA();
        $handlerB = new Book\ConcreteHandlerB($handlerA);

        $handlerB->handleRequest();
        $this->assertTrue($handlerB->handledRequest());

        // A does not handles the request, then it forwards to B.
        $handlerB = new Book\ConcreteHandlerB();
        $handlerA = new Book\ConcreteHandlerA($handlerB);

        $handlerA->handleRequest();
        $this->assertTrue($handlerB->handledRequest());
    }
}