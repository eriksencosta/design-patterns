<?php

namespace GOFPatterns\Composite\Book;

use Doctrine\Common\Collections\ArrayCollection;

class Composite extends Component
{
    /**
     * "Child ordering". Iterator pattern can help if orders matters. The Doctrine ArrayCollection implements this
     * the Iterator pattern (implementing PHP Spl classes like ArrayAccess, Countable and IteratorAggregate).
     *
     * "What's the best data structure for storing components?". It depends on efficiency.
     *
     * @var ArrayCollection
     */
    protected $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function operation()
    {
        foreach ($this->children as $child) {
            $child->operation();
        }
    }

    public function add(ComponentInterface $child)
    {
        $child->setParent($this);
        $this->children->add($child);
    }

    public function remove(ComponentInterface $child)
    {
        if ($this->children->removeElement($child)) {
            $child->setParent(null);
        }
    }

    public function get($key)
    {
        return $this->children->get($key);
    }
}