<?php

namespace GOFPatterns\Command\Book;

use InvalidArgumentException;

class CallbackConcreteCommand extends AbstractCommand
{
    private $callback;
    private $callbackArgs;

    public function __construct($callback, array $callbackArgs = array())
    {
        if (!is_callable($callback)) {
            throw new InvalidArgumentException('$callback must be a valid PHP callable. It was passed a "'.gettype($callback).'" value.');
        }

        $this->callback = $callback;
        $this->callbackArgs = $callbackArgs;
    }

    public function execute()
    {
        call_user_func_array($this->callback, $this->callbackArgs);
    }
}