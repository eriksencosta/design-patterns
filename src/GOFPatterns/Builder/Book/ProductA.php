<?php

namespace GOFPatterns\Builder\Book;

class ProductA
{
    private $part;

    public function setPart(Part $part)
    {
        $this->part = $part;

        return $this;
    }

    public function getPart()
    {
        return $this->part;
    }
}