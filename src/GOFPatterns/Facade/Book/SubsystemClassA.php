<?php

namespace GOFPatterns\Facade\Book;

class SubsystemClassA
{
    private $dependency;

    public function __construct(SubsystemClassB $dependency)
    {
        $this->dependency = $dependency;
    }

    public function operation()
    {
        return $this->dependency->operation();
    }
}