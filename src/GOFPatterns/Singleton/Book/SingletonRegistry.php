<?php

namespace GOFPatterns\Singleton\Book;

use RuntimeException;

/**
 * "Subclassing the Singleton class". This is a suggested way to use a Registry of Singletons in PHP. Subclasses does
 * not need to registry explicitally like in the GOF book's C++ example, they just need to override the class method
 * getSingletonClass().
 *
 * This example is simpler than the so called "Multiton" pattern: http://en.wikipedia.org/wiki/Multiton_pattern#PHP
 */
class SingletonRegistry
{
    static private $instances;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    static public function getInstance()
    {
        $className = static::getSingletonClass();

        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }

    /**
     * Only possible in PHP 5.3 due to the late static binding.
     *
     * See: http://php.net/manual/en/language.oop5.late-static-bindings.php
     */
    static public function getSingletonClass()
    {
        if (get_called_class() !== __CLASS__) {
            throw new RuntimeException('You need to override this class method to subclass and register you SingletonRegistry class.');
        }

        return __CLASS__;
    }
}