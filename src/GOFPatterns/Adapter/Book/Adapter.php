<?php

namespace GOFPatterns\Adapter\Book;

/**
 * This is an object Adapter example. This example can be tought as a merge of "Pluggable adapters (a) using abstract
 * operations and (b) using delegate objects". See @todo.
 *
 * Quoted in other classes:
 *
 * - "Pluggable adapters (c) parameterized adapters": see ParameterizedAdapter class. (implementation)
 *
 * Not quoted:
 *
 * - "Implementing class adapters in C++": just have utility in languages that support multiple inheritance
 *
 * @todo Find good examples for the Pluggable Adapters a and b (abstract operations and delegate objects). The
 * "Contributing to Eclipse: principles, patterns, and plug-ins" (1) says:
 *
 * The idea behind Pluggable Adapter is to make a class more general by building interface adaptation into the class.
 * The Adapter pattern sketches different flavors for implementing a Pluggable Adapter:
 *
 * - Using abstract methods: The class defines abstract methods to access the domain. Clients need to subclass and
 *   implement these abstract methods.
 * - Using delegate objects: The methods to access the domain are forwarded to a separate delegate object, which defines
 *   a method like getChildren().
 *
 * (1) On Google Books: http://miud.in/1ccT
 */
class Adapter implements Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        return $this->adaptee->specificRequest();
    }
}