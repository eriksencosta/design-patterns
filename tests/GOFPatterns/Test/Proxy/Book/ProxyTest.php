<?php

namespace GOFPatterns\Test\Proxy\Book;

use GOFPatterns\Proxy\Book;
use PHPUnit_Framework_TestCase;

class ProxyTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $realSubject = new Book\RealSubject(1);

        $proxyMock = $this->getMock(
            'GOFPatterns\Proxy\Book\Proxy',
            array('__load'),
            array(1)
        );

        $proxyMock
            ->expects($this->once())
            ->method('__load')
            ->will($this->returnValue($realSubject))
        ;

        $this->assertTrue($proxyMock->request());
    }

    public function testGenericProxyPattern()
    {
        $proxy = new Book\GenericProxy('\GOFPatterns\Proxy\Book\RealSubject', 1);

        $this->assertTrue($proxy->request());
    }
}