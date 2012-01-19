<?php

namespace GOFPatterns\Decorator\Book;

/**
 * "Keeping Component classes lightweight":
 *
 * - To ensure a conforming interface, components and decorators must descend from a common Component class
 * - The definition of the data representation should be deferred to subclasses; otherwise the complexity of the
 *   Component class might make the decorators too heavyweight to use in quantity
 *
 * Making the Component interface is a good choice IMHO.
 */
interface ComponentInterface
{
    function operation();
}