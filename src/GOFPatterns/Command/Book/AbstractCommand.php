<?php

namespace GOFPatterns\Command\Book;

/**
 * Basic implementation for a Command. To be reversible by the client Application interface, a concrete subclass must
 * return true in the isReversible() method. This way the command can check its internal state at run-time and define
 * if it is reversible or not. A better way would be expose extension points as protected methods and provides one level
 * indirection in the unExecute() method that should check if the command is reversible and then call the override
 * protected method.
 *
 * See the Application class for a basic implementation of a history list.
 *
 * The Symfony Console component provides a Command implementation for CLIs. The execute method in the base Command
 * class is protected and is called by the run() method that validates all the input data. It does not provide an
 * undoable API.
 *
 * Symfony Console Command class: https://github.com/symfony/symfony/blob/master/src/Symfony/Component/Console/Command/Command.php
 */
abstract class AbstractCommand
{
    abstract public function execute();

    public function unExecute()
    {
    }

    public function isReversible()
    {
        return false;
    }
}