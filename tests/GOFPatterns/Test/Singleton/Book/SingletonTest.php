<?php

namespace GOFPatterns\Test\Singleton\Book;

use GOFPatterns\Singleton\Book;
use PHPUnit_Framework_TestCase;
use RuntimeException;

class SingletonTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $reference1 = Book\Singleton::getInstance();
        $reference2 = Book\Singleton::getInstance();

        $this->assertSame($reference1, $reference2);
    }

    public function testPatternSingletonRegistry()
    {
        $reference1 = Book\SingletonRegistry::getInstance();
        $reference2 = Book\SingletonRegistry::getInstance();

        $this->assertSame($reference1, $reference2);

        $reference1 = Book\SingletonClassA::getInstance();
        $reference2 = Book\SingletonClassA::getInstance();

        $this->assertSame($reference1, $reference2);

        try {
            $reference = Book\SingletonClassB::getInstance();
            $this->fail('Subclass does not override getInstanceClass() class method, it should throw a RuntimeException!');
        }
        catch (RuntimeException $e) {
        }
    }
}