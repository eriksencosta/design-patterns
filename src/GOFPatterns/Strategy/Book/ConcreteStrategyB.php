<?php

namespace GOFPatterns\Strategy\Book;

class ConcreteStrategyB extends Strategy
{
    public function algorithm(Context $context)
    {
        // Consequence: "Communication overhead between Strategy and Context", the data available in Context is not
        // use in this Strategy.
        return 'B';
    }
}