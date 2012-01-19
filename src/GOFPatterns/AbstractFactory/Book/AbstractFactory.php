<?php

namespace GOFPatterns\AbstractFactory\Book;

/**
 * "Factories as singletons". No!
 */
abstract class AbstractFactory
{
    /**
     * "Creating the products". AbstractFactory only declares an interface for creating products. It's up to
     * ConcreteProduct subclasses to actually create them. The most common way to do this is to define a factory method
     * (see Factory Method (107)) for each product.
     *
     * See AlternativeFactory class to more about this.
     */
    abstract public function createProduct();
}