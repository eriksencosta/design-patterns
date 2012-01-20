<?php

namespace GOFPatterns\Command\Book;

class Invoker
{
    private $command;

    public function __construct(AbstractCommand $command)
    {
        $this->command = $command;
    }

    /**
     * This method can be a callback for something. An onClick event, e.g.
     */
    public function operation()
    {
        $this->command->execute();
    }

    /**
     * This method can be a callback for something. An onClick event, e.g.
     */
    public function undoOperation()
    {
        $this->command->unExecute();
    }
}