<?php

namespace GOFPatterns\Test\Prototype\Book;

use GOFPatterns\Prototype\Book;
use PHPUnit_Framework_TestCase;

class PrototypeTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $prototypeA = new Book\ConcretePrototypeA();
        $clonePrototypeA = clone $prototypeA;

        $this->assertNotSame($prototypeA, $clonePrototypeA);
        $this->assertEquals($prototypeA, $clonePrototypeA);
        $this->assertSame($prototypeA->reference, $clonePrototypeA->reference);

        $prototypeB = new Book\ConcretePrototypeB();
        $clonePrototypeB = clone $prototypeB;

        $this->assertNotSame($prototypeB, $clonePrototypeB);
        $this->assertNotSame($prototypeB->reference, $clonePrototypeB->reference);
    }
}