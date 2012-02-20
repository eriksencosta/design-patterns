<?php

namespace GOFPatterns\Test\Adapter\Book;

use GOFPatterns\Adapter\Book;
use PHPUnit_Framework_TestCase;

class AdapterTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $adapter = new Book\Adapter(new Book\Adaptee());

        $this->assertTrue($adapter->request());
    }

    public function testParametrizedAdapterPattern()
    {
        $adapter = new Book\ParameterizedAdapter(new Book\Adaptee(), array('request' => 'specificRequest'));

        $this->assertTrue($adapter->request());
    }
}