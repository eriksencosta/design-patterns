<?php

namespace GOFPatterns\Flyweight\Book;

/**
 * "Managing shared objects". Because objects are shared, clients shouldn't instantiate directly.
 *
 * See Flyweight class about the possibility of the Factory method location.
 */
class FlyweightFactory
{
    static private $concreteFlyweights;

    static public function createConcreteFlyweight($key)
    {
        if (!isset(self::$concreteFlyweights[$key])) {
            self::$concreteFlyweights[$key] = new ConcreteFlyweight($key);
        }

        return self::$concreteFlyweights[$key];
    }

    /**
     * The Flyweight enables sharing, it doesn't enforce it. Creating a non shared Flyweight from the FlyweightFactory
     * is good since it will prevent changing the client code when making the Flyweight shareable at some time.
     */
    static public function createUnsharedConcreteFlyweight()
    {
        return new UnsharedConcreteFlyweight();
    }
}