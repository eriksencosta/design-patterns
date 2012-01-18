<?php

namespace GOFPatterns\Flyweight\Book;

abstract class Flyweight
{
    /**
     * "Removing extrinsic state".
     *
     * The Flyweight pattern is often combined with the Composite (163) pattern to represent a hierarchical structure
     * as a graph with shared leaf nodes. A consequence of sharing is that flyweight leaf nodes cannot store a pointer
     * to their parent. Rather, the parent pointer is passed to the flyweight as part of its extrinsic state. This has
     * a major impact on how the objects in the hierarchy communicate with each other. (consequence)
     *
     * This sample implementation resembles a lot a Strategy as both provides encapsulation for algorithms.
     * The difference is that a Flyweight is intented to use sharing to support large numbers of fine-grained objects
     * efficiently. (intent)
     *
     * It's often best to implement State (305) and Strategy (315) objects as flyweights. (related patterns)
     */
    public function operation(FlyweightContext $context)
    {
        return $context->getValue();
    }

    /**
     * The Flyweight can provide Factory methods. A good example of this is the Doctrine DBAL Type class. It's a
     * Flyweight and have a Factory method (getType). It's also a good example of removing extrinsic state. The Type
     * subclasses does not have intrisic state and are a mix of Strategy with Adapter patterns (through
     * AbstractPlatform).
     *
     * Doctrine DBAL Type class: https://github.com/doctrine/dbal/blob/master/lib/Doctrine/DBAL/Types/Type.php
     */
    //static private $concreteFlyweights;

    //static public function createConcreteFlyweight($key)
    //{
    //    if (!isset(self::$concreteFlyweights[$key])) {
    //        self::$concreteFlyweights[$key] = new ConcreteFlyweight($key);
    //    }
    //
    //    return self::$concreteFlyweights[$key];
    //}

    //static public function createUnsharedConcreteFlyweight()
    //{
    //    return new UnsharedConcreteFlyweight();
    //}
}