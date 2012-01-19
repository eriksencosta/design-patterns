<?php

namespace GOFPatterns\Bridge\Book;

/**
 * "Using multiple inheritance". Not applicable in PHP.
 *
 * "Improved extensibility". You can extend the Abstraction and Implementor hierarchies independently. (consequence)
 *
 * * Not quoted:
 *
 * - "Sharing implementors": not applicable in PHP. See Coplien Counted Body.
 *
 * Coplien Counted Body: http://users.rcn.com/jcoplien/Patterns/C++Idioms/EuroPLoP98.html#CountedBody
 */
abstract class Abstraction
{
    protected $implementor;

    /**
     * "Creating the right Implementor object":
     *
     * - If Abstraction knows about all Concretelmplementor classes, then it can instantiate one of them in its
     *   constructor
     * - It's also possible to delegate the decision to another object altogether (a factory object, e.g.)
     *
     * "Decoupling interface and implementation". An implementation is not bound permanently to an interface.
     * Furthermore, this decoupling encourages layering that can lead to a better-structured system. The high-level
     * part of a system only has to know about Abstraction and Implementor. (consequence)
     */
    public function __construct(ImplementorInterface $implementor)
    {
        $this->implementor = $implementor;
    }

    abstract public function operation();
}