<?php

namespace GOFPatterns\Decorator\Book;

class Component implements ComponentInterface
{
    /**
     * "Interface conformance".
     */
    public function operation()
    {
        // do something.
    }
}