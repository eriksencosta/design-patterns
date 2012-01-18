<?php

namespace GOFPatterns\Test\Composite\Book;

use GOFPatterns\Composite\Book;
use PHPUnit_Framework_TestCase;

class CompositeTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $composite = new Book\Composite();

        $leafMock = $this->getMock('GOFPatterns\Composite\Book\Leaf', array('operation'));

        $composite->add($leafMock);
        $this->assertEquals($leafMock, $composite->get(0));
        $this->assertEquals($composite, $leafMock->getParent());

        $leafMock
            ->expects($this->once())
            ->method('operation')
        ;

        $composite->operation();

        $composite->remove($leafMock);
        $this->assertNull($composite->get(0));
        $this->assertNull($leafMock->getParent());
    }
}