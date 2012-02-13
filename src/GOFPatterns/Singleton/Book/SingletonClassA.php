<?php

namespace GOFPatterns\Singleton\Book;

class SingletonClassA extends SingletonRegistry
{
    static public function getSingletonClass()
    {
        return __CLASS__;
    }
}