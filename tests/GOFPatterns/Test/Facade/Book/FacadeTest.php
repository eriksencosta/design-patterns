<?php

namespace GOFPatterns\Test\Facade\Book;

use GOFPatterns\Facade\Book;
use PHPUnit_Framework_TestCase;

class FacadeTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $facade = new Book\Facade();

        $this->assertTrue($facade->operation());
    }
}