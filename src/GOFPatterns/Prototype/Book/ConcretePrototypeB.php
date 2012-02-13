<?php

namespace GOFPatterns\Prototype\Book;

class ConcretePrototypeB extends AbstractPrototype
{
    /**
     * "Implementing the Clone operation". The hardest part of the Prototype pattern is implementing the Clone operation
     * correctly. It's particularly tricky when object structures contain circular references. (implementation)
     *
     * The default PHP clone operation makes a shallow copy of the object being cloned. For complex objects, a __clone()
     * method can be implemented. If this method is defined, it is called after the clone operation.
     *
     * See: http://php.net/clone
     */
    public function __clone()
    {
        $this->reference = clone $this->reference;
        $this->reference->someProperty = 'someDifferentValue';
    }
}