<?php

namespace GOFPatterns\ChainOfResponsibility\Book;

class ConcreteHandlerB extends Handler
{
    private $handledRequest = false;

    public function handledRequest()
    {
        return $this->handledRequest;
    }

    public function handleRequest()
    {
        if ($this->canHandleRequest()) {
            $this->handledRequest = true;
        } else {
            parent::handleRequest();
        }
    }

    public function canHandleRequest()
    {
        return true;
    }
}