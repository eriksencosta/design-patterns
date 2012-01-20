<?php

namespace GOFPatterns\Command\Book;

class ConcreteCommand extends AbstractCommand
{
    /**
     * "How intelligent should a command be?". A command can have a wide range of abilities. At one extreme it merely
     * defines a binding between a receiver and the actions that carry out the request. At the other extreme it
     * implements everything itself without delegating to a receiver at all.
     */
    public function execute()
    {
        // do something.
    }
}