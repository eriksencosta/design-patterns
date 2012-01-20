<?php

namespace GOFPatterns\Command\Book;

/**
 * "Supporting undo and redo". A ConcreteCommand class might need to store additional state to do so. This state
 * can include:
 *
 * - the Receiver object, which actually carries out operations in response to the request (see Constructor)
 * - the arguments to the operation performed on the receiver, and (see execute(), unExecute() and isReversible())
 * - any original values in the receiver that can change as a result of handling the request. The receiver must
 *   provide operations that let the command return the receiver to its prior state.
 */
class UndoableConcreteCommand extends AbstractCommand
{
    private $receiver;
    private $receiverState;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * "Avoiding error accumulation in the undo process". Hysteresis can be a problem in ensuring a reliable,
     * semantics-preserving undo/redo mechanism. Errors can accumulate as commands are executed, unexecuted, and
     * reexecuted repeatedly so that an application's state eventually diverges from original values. It may be
     * necessary therefore to store more information in the command to ensure that objects are restored to their
     * original state. The Memento (283) pattern can be applied to give the command access to this information without
     * exposing the internals of other objects.
     */
    public function execute()
    {
        $string = $this->receiver->getState();
        $this->receiverState = $string;

        $this->receiver->operation($string.$string);
    }

    public function unExecute()
    {
        if ($this->isReversible()) {
            $this->receiver->operation($this->receiverState);
            $this->receiverState = null;
        }
    }

    public function isReversible()
    {
        return null !== $this->receiverState ? true : false;
    }
}