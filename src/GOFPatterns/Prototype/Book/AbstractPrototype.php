<?php

namespace GOFPatterns\Prototype\Book;

use stdClass;

/**
 * The Prototype implementation is easy. Aside that, the consequences are also worth listing:
 *
 * - "Adding and removing products at run-time"
 * - "Specifying new objects by varying values"
 * - "Specifying new objects by varying structure"
 * - "Reduced subclassing" (as oposed to Factory Method)
 * - "Configuring an application with classes dynamically"
 *
 * From the consequences, it is easy to see that Prototype can help a lot in highly dynamic applications, where new
 * concrete product classes can be incorporated simply by registering new prototypical instances into a client or into
 * a prototype manager. A good example is the usage of Prototype with the Abstract Factory pattern, making the factory
 * class more flexible and eliminating the need for subclassing. In PHP a common implementation is the usage of the
 * language ability to create objects from a string containing the class name, that is used when there is not a need
 * to clone a prototypical instance (this is in fact an alternative to use the Prototype when there is not a need
 * to provide an initialize() operation):
 *
 * <code>
 * $className = 'stdClass';
 * $object = new $className;
 * </code>
 *
 * Language features like these are the fact that make Prototype less important for some languages (Smalltalk) than
 * others (C++).
 *
 * Quoted in other classes:
 *
 * - "Implementing the Clone operation". See ConcretePrototypeB and the pattern test class. (implementation)
 *
 * Not quoted:
 *
 * - "Using a prototype manager" (implementation)
 */
abstract class AbstractPrototype
{
    public $reference;

    public function __construct()
    {
        $this->reference = new stdClass;
        $this->reference->someProperty = 'someValue';
    }

    /**
     * "Initializing clones" It might be the case that your prototype classes already define operations for (re)setting
     * key pieces of state. If so, clients may use these operations immediately after cloning. If not, then you may have
     * to introduce an Initialize operation (see the Sample Code section) that takes initialization parameters as
     * arguments and sets the clone's internal state accordingly. Beware of deep-copying Clone operations—the copies may
     * have to be deleted (either explicitly or within Initialize) before you reinitialize them.
     */
    public function initialize()
    {
    }
}