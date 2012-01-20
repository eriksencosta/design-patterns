<?php

namespace GOFPatterns\Command\Book;

class Receiver
{
    private $state;

    public function __construct($state = '')
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function operation($value)
    {
        $this->state = $value;

        return $this->state;
    }
}