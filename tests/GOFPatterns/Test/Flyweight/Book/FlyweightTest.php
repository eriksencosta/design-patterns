<?php

namespace GOFPatterns\Test\Flyweight\Book;

use GOFPatterns\Flyweight\Book;
use PHPUnit_Framework_TestCase;

class FlyweightTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $flyweightA  = Book\FlyweightFactory::createConcreteFlyweight('A');
        $flyweightB1 = Book\FlyweightFactory::createConcreteFlyweight('B');
        $flyweightB2 = Book\FlyweightFactory::createConcreteFlyweight('B');

        $this->assertNotSame($flyweightA, $flyweightB1);
        $this->assertSame($flyweightB1, $flyweightB2);

        $context = new Book\FlyweightContext(1);
        $this->assertEquals('A (1)', $flyweightA->operation($context));

        $context = new Book\FlyweightContext(2);
        $this->assertEquals('B (2)', $flyweightB1->operation($context));
        $this->assertEquals('B (2)', $flyweightB2->operation($context));

        $unsharedFlyweightA = Book\FlyweightFactory::createUnsharedConcreteFlyweight();

        $context = new Book\FlyweightContext(3);
        $this->assertEquals('3', $unsharedFlyweightA->operation($context));

        $unsharedFlyweightB = Book\FlyweightFactory::createUnsharedConcreteFlyweight();

        $this->assertNotSame($unsharedFlyweightA, $unsharedFlyweightB);
    }
}