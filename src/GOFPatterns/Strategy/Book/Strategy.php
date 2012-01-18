<?php

namespace GOFPatterns\Strategy\Book;

/**
 * Quoted in other classes:
 *
 * - "Making Strategy objects optional". See Context class.
 *
 * Not quoted:
 *
 * - "Strategies as template parameters" - not applicable in PHP (generics are not available in the language).
 */
abstract class Strategy
{
    /**
     * "Defining the Strategy and Context interfaces" it states that the Strategy can store a reference to its context,
     * eliminating the need to pass anything at all. Surely the Context would need to set it as the Strategy context
     * before requesting the desired strategy operation. (implementation).
     *
     * But this can be bad when there is an "Increased number of objects" (consequence). This can be reduced
     * implementing a stateless Strategy that can be shared accross invocations by the Context (that stores any
     * residual state). A stateless Strategy is also good because can reduce the
     * "Communication overhead between Strategy and Context" (consequence) and reduces the need to the Context to
     * initialize the values to pass to the Strategy. The drawback is that the Context needs to have a more elaborate
     * interface to its data (which couples Context and Strategy more closely).
     */
    // protected $context;
    // public function setContext(Context $context) {
    //    $this->context = $context;
    // }

    /**
     * "Defining the Strategy and Context interfaces", The Strategy and Context interfaces must give a ConcreteStrategy
     * efficient access to any data it needs from a context, and vice versa.
     *
     * See above comment about implementation and consequences.
     */
    abstract public function algorithm(Context $context);
}