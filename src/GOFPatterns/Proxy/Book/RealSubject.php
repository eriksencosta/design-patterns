<?php

namespace GOFPatterns\Proxy\Book;

class RealSubject implements Subject
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function request()
    {
        return true;
    }
}