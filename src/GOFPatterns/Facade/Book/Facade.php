<?php

namespace GOFPatterns\Facade\Book;

/**
 * Facade defines a higher-level interface that makes a subsystem easier to use. This interface provides common cases
 * implementation.
 *
 * "Reducing client-subsystem coupling". The coupling between clients and the subsystem can be reduced even further by
 * making Facade an abstract class with concrete subclasses for different implementations of a subsystem. Then clients
 * can communicate with the subsystem through the interface of the abstract Facade class. This abstract coupling keeps
 * clients from knowing which implementation of a subsystem is used. An alternative to subclassing is to configure a
 * Facade object with different subsystem objects. To customize the facade, simply replace one or more of its subsystem
 * objects.
 *
 * "Public versus private subsystem classes" not applicable in PHP. There is not namespace visibility support in the
 * language. (implementation)
 *
 * A Facade differs from Mediator since the abstracted objects are aware of the Mediator, using it as the communication
 * channel. The objects that a Facade abstracts are not aware of the Facade and does not communicate with it.
 * Nevertheless, Facades can be used as dependencies to one another to simplify the subsystem's dependencies.
 * (implementation and related patterns)
 */
class Facade
{
    /**
     * "It shields clients from subsystem components." (consequence)
     *
     * "It promotes weak coupling between the subsystem and its clients. Often the components in a subsystem are
     * strongly coupled. Weak coupling lets you vary the components of the subsystem without affecting its clients.
     * Facades help layer a system and the dependencies between objects." (consequence)
     *
     * "Although the subsystem objects perform the actual work, the facade may have to do work of its own to translate
     * its interface to subsystem interfaces." (collaboration)
     *
     * A Facade can be parameterized to add flexibility but allowing too much flexibility detract the pattern's mission,
     * which is to simplify the interface for the common case.
     */
    public function operation()
    {
        $classA = new SubsystemClassA(new SubsystemClassB());

        return $classA->operation();
    }
}