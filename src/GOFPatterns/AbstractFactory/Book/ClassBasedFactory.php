<?php

namespace GOFPatterns\AbstractFactory\Book;

/**
 * See AlternativeFactory class.
 */
class ClassBasedFactory
{
    private $classes;

    public function __construct(array $classes)
    {
        $this->classes = $classes;
    }

    /**
     * This is a similar to the class-based abstract factory pattern in GoF (91). It's differ only because in PHP
     * classes are not first citizens like in Smalltalk. But PHP makes easy to instantiate an object using the new
     * operator with a class name string (e.g.: new "\stdClass").
     */
    public function create($className)
    {
        if (!isset($this->classes[$className])) {
            throw new \InvalidArgumentException();
        }

        return new $this->classes[$className];
    }
}