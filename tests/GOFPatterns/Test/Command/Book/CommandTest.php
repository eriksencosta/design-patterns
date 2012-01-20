<?php

namespace GOFPatterns\Test\Command\Book;

use GOFPatterns\Command\Book;
use PHPUnit_Framework_TestCase;

class CommandTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        // A client (in this case, the test case) configures an invoker that will execute a command.
        // Command decouples the object that invokes the operation from the one that knows how to perform it
        // (consequence)
        $receiver = new Book\Receiver('A');
        $command = new Book\UndoableConcreteCommand($receiver);
        $invoker = new Book\Invoker($command);

        $invoker->operation();
        $this->assertEquals('AA', $receiver->getState());

        $invoker->undoOperation();
        $this->assertEquals('A', $receiver->getState());

        // Using the callback command class (similar to "Using C++ templates" in the PHP way).
        $function = function($receiver, $value) {
            $receiver->operation($value);
        };

        $command = new Book\CallbackConcreteCommand($function, array($receiver, 'B'));
        $invoker = new Book\Invoker($command);

        $invoker->operation();
        $this->assertEquals('B', $receiver->getState());
    }

    public function testHistoryList()
    {
        // Application is the invoker in this case. A more refined implementation would create an Application object
        // composed of Invoker objects or inject an Application object into every Invoker as a context dependency.
        $app = new Book\Application();
        $receiver = new Book\Receiver('A');
        $undoableCommand = new Book\UndoableConcreteCommand($receiver);

        $notUndoableCommand = $this->getMock('GOFPatterns\Command\Book\ConcreteCommand');
        $notUndoableCommand
            ->expects($this->once())
            ->method('execute')
        ;

        $notUndoableCommand
            ->expects($this->any())
            ->method('unExecute')
        ;

        $app->executeCommand($undoableCommand);
        $this->assertEquals('AA', $receiver->getState());

        $app->executeCommand($undoableCommand);
        $this->assertEquals('AAAA', $receiver->getState());

        $app->undo();
        $this->assertEquals('AA', $receiver->getState());

        $app->undo();
        $this->assertEquals('A', $receiver->getState());

        $app->undo();
        $this->assertEquals('A', $receiver->getState());

        $app->redo();
        $this->assertEquals('AA', $receiver->getState());

        $app->redo();
        $this->assertEquals('AAAA', $receiver->getState());

        $app->redo();
        $this->assertEquals('AAAA', $receiver->getState());

        // Executes our not undoable command (simply does not when unExecute is called).
        $app->executeCommand($notUndoableCommand);

        // Undo UndoableConcreteCommand since ConcreteCommand is not reversible.
        $app->undo();
        $this->assertEquals('AA', $receiver->getState());

        $app->redo();
        $this->assertEquals('AAAA', $receiver->getState());
    }
}