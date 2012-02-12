<?php

namespace GOFPatterns\Builder\Book;

class ProductB
{
    private $part;
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function setPart(Part $part)
    {
        $this->part = $part;

        return $this;
    }

    public function getPart()
    {
        return $this->part;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }
}