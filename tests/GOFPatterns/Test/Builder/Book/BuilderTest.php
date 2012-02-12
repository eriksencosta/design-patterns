<?php

namespace GOFPatterns\Test\Builder\Book;

use GOFPatterns\Builder\Book;
use PHPUnit_Framework_TestCase;

class BuilderTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $builderA = new Book\ConcreteBuilderA();
        $productA = $builderA
            ->buildProduct()
            ->buildPart()
            ->getProduct()
        ;

        $this->assertInstanceOf('GOFPatterns\Builder\Book\ProductA', $productA);
        $this->assertEquals('A', $productA->getPart()->getName());

        $builderB = new Book\ConcreteBuilderB();
        $productB = $builderB
            ->buildProduct()
            ->buildPart()
            ->getProduct()
        ;

        $this->assertInstanceOf('GOFPatterns\Builder\Book\ProductB', $productB);
        $this->assertEquals('someValue', $productB->getValue());
        $this->assertEquals('B', $productB->getPart()->getName());
    }
}