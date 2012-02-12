<?php

namespace GOFPatterns\Composite\Book;

use GOFPatterns\Exception\NotImplementedException;

abstract class Component implements ComponentInterface
{
    /**
     * "Should Component implement a list of Components?". Putting the child pointer in the base class incurs a space
     * penalty for every Leaf.
     */
    // private $children;

    /**
     * @var ComponentInterface
     */
    private $parent;

    public function add(ComponentInterface $child)
    {
        throw new NotImplementedException(__METHOD__);
    }

    public function remove(ComponentInterface $child)
    {
        throw new NotImplementedException(__METHOD__);
    }

    public function get($index)
    {
        throw new NotImplementedException(__METHOD__);
    }

    public function getChildren()
    {
        return array();
    }

    public function setParent(ComponentInterface $parent = null)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }
}