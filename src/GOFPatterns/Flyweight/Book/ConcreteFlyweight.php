<?php

namespace GOFPatterns\Flyweight\Book;

class ConcreteFlyweight extends Flyweight
{
    private $name;

    /**
     * "Clients should not instantiate ConcreteFlyweights directly". (collaborations)
     *
     * Some designs enforces the above statment by defining a private or protected constructor. This is fine since it
     * will still be possible to unit test a ConcreteFlyweight through it's interface.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function operation(FlyweightContext $context)
    {
        $value = $context->getValue();
        $value = null === $value ? '' : ' ('.$value.')';

        return $this->name.$value;
    }
}