<?php

namespace GOFPatterns\Exception;

use RuntimeException;

class NotImplementedException extends RuntimeException
{
    public function __construct($methodName, $message = '', $code = 0, $previous = null)
    {
        $message = 'The method "'.$methodName.'" is not implemented.';

        parent::__construct($message, $code, $previous);
    }
}