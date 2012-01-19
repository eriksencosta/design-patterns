<?php

namespace GOFPatterns\Test\AbstractFactory\Book;

use GOFPatterns\AbstractFactory\Book;
use PHPUnit_Framework_TestCase;

class AbstractFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $factoryA = new Book\FamilyA\Factory();
        $this->assertInstanceOf('GOFPatterns\AbstractFactory\Book\FamilyA\Product', $factoryA->createProduct());

        $factoryB = new Book\FamilyB\Factory();
        $this->assertInstanceOf('GOFPatterns\AbstractFactory\Book\FamilyB\Product', $factoryB->createProduct());

        $factory = new Book\AlternativeFactory();
        $this->assertInstanceOf('GOFPatterns\AbstractFactory\Book\FamilyA\Product', $factory->create('productA'));
        $this->assertInstanceOf('GOFPatterns\AbstractFactory\Book\FamilyB\Product', $factory->create('productB'));

        // "Defining extensible factories" is not a problem in dinamically type languages.
        $this->assertEquals(1, $factory->create('productB')->differentOperation(1));
    }
}