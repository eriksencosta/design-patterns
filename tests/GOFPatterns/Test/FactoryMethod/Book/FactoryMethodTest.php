<?php

namespace GOFPatterns\Test\FactoryMethod\Book;

use GOFPatterns\FactoryMethod\Book;
use PHPUnit_Framework_TestCase;

class FactoryMethodTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $factory = new Book\Creator();

        $this->assertInstanceOf('GOFPatterns\FactoryMethod\Book\Product', $factory->createProduct());
    }
}