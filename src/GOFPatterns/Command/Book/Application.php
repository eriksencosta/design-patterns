<?php

namespace GOFPatterns\Command\Book;

/**
 * History list in .Net MVC: http://www.codeproject.com/KB/architecture/commandpatterndemo.aspx
 */
class Application
{
    private $commandHistory;
    private $commandIndex;

    public function __construct()
    {
        $this->commandHistory = array();
        $this->commandIndex = 0;
    }

    /**
     * "Supporting undo and redo". An undoable command might have to be copied before it can be placed on the history
     * list. That's because the command object that carried out the original request, say, from a Menultem, will perform
     * other requests at later times. Copying is required to distinguish different invocations of the same command if
     * its state can vary across invocations.
     */
    public function executeCommand(AbstractCommand $command)
    {
        $command->execute();

        // This implementation does not store commands that are not reversible.
        if ($command->isReversible()) {
            $this->commandHistory[] = clone $command;
            $this->commandIndex = count($this->commandHistory) - 1;
        }
    }

    public function undo()
    {
        if ($this->hasCommandToUndo()) {
            $command = $this->commandHistory[$this->commandIndex];
            $command->unExecute();
            --$this->commandIndex;
        }
    }

    public function redo()
    {
        if ($this->hasCommandToRedo()) {
            ++$this->commandIndex;
            $command = $this->commandHistory[$this->commandIndex];
            $command->execute();
        }
    }

    private function hasCommandToUndo()
    {
        return $this->getTotalHistoryCommands() && 0 <= $this->commandIndex;
    }

    private function hasCommandToRedo()
    {
        $totalCommands = $this->getTotalHistoryCommands();
        return $totalCommands && $this->commandIndex + 1 < $totalCommands;
    }

    private function getTotalHistoryCommands()
    {
        return count($this->commandHistory);
    }
}