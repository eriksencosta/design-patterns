<?php

namespace GOFPatterns\Composite\Book;

/**
 * Since this pattern can make a design overly general (consequence), it's common to see it being used with other
 * patterns like Chain of Resposibility, Decorator, Flyweight, Iterator and Visitor.
 *
 * Quoted in other classes:
 *
 * - "Should Component implement a list of Components?". See Component class.
 * - "What's the best data structure for storing components?". See Composite class.
 *
 * Not quoted:
 *
 * - "Caching to improve performance"
 * - "Who should delete components?"
 */
interface ComponentInterface
{
    function operation();

    /**
     * "Declaring the child management operations". This example emphasize transparency. The client will treat all
     * components uniformly. (implementation)
     *
     * "Child ordering". See Composite class.
     *
     * @param ComponentInterface $child
     */
    function add(ComponentInterface $child);

    /**
     * @param ComponentInterface $child
     */
    function remove(ComponentInterface $child);

    /**
     * @param int $key
     * @return ComponentInterface|null
     */
    function get($key);

    /**
     * "Maximizing the Component interface", this way clients can be unaware of the specific Leaf or Composite classes.
     *
     * @return array
     */
    function getChildren();

    /**
     * "Sharing components" Flyweight shows how to avoid storing parents.
     * "Explicit parent references" can simplify the traversal and management of a composite structure.
     *
     * @param ComponentInterface|null
     */
    function setParent(ComponentInterface $parent = null);

    /**
     * @return ComponentInterface
     */
    function getParent();
}