<?php

namespace GOFPatterns\FactoryMethod\Book;

/**
 * "Two major varieties" the two main variations of the Factory Method pattern are (1) the case when the Creator class
 * is an abstract class and does not provide an implementation for the factory method it declares, and (2) the case when
 * the Creator is a concrete class and provides a default implementation for the factory method. It's also possible to
 * have an abstract class that defines a default implementation, but this is less common.
 *
 * The first case requires subclasses to define an implementation,because there's no reasonable default. It gets around
 * the dilemma of having to instantiate unforeseeable classes. In the second case, the concrete Creator uses the
 * factory method primarily for flexibility. It's following a rule that says, "Create objects in a separate operation
 * so that subclasses can override the way they're created." This rule ensures that designers of subclasses can change
 * the class of objects their parent class instantiates if necessary. (implementation)
 *
 * "Parameterized factory methods". See GOFPatterns\AbstractFactory\Book\AlternativeFactory for an example in PHP.
 * (implementation)
 *
 * "Language-specific variants and issues". See GOFPatterns\AbstractFactory\Book\ClassBasedFactory for an example in
 * PHP. (implementation)
 *
 * Not quoted:
 *
 * - "Using templates to avoid subclassing" - not applicable in PHP (generics are not available in the language).
 */
abstract class AbstractCreator
{
    /**
     * "Naming conventions", in PHP projects, the "create" prefix seems to be the standard. (implementation)
     *
     * "Connects parallel class hierarchies" it's the case when Factory Method is created for clients consumption, where
     * a concrete product defines the Factory Method that returns an object to delegate some of its responsibilities.
     * This can lead to a parallel hierarchy (partially or not) that is connected by the Factory Method where the
     * knowledge for which classes belong together is localized. (consequence)
     *
     * "Provides hooks for subclasses". (consequence)
     *
     * A potential disadvantage of factory methods is that clients might have to subclass the Creator class just to
     * create a particular ConcreteProduct object. Subclassing is fine when the client has to subclass the Creator class
     * anyway, but otherwise the client now must deal with another point of evolution. (consequence)
     */
    abstract public function createProduct();
}