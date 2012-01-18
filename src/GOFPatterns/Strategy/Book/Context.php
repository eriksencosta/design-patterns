<?php

namespace GOFPatterns\Strategy\Book;

class Context
{
    private $strategy;
    private $value;

    /**
     * "Making Strategy objects optional", The Context class may be simplified if it's meaningful not to have a Strategy
     * object. Context checks to see if it has a Strategy object before accessing it. If there is one, then Context uses
     * it normally. If there isn't a strategy, then Context carries out default behavior.
     *
     * In this example, we use the ConcreteStrategyA if the Context was not created with an explicit Strategy. Martin
     * Fowler uses a similar example in his PoEAA.
     */
    public function __construct(Strategy $strategy = null)
    {
        if (null === $strategy) {
            $strategy = new ConcreteStrategyA();
        }

        $this->strategy = $strategy;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function calculateNewValue()
    {
        $newValue = $this->strategy->algorithm($this);
        $this->setValue($newValue);
    }
}