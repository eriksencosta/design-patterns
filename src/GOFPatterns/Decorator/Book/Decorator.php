<?php

namespace GOFPatterns\Decorator\Book;

/**
 * "Omitting the abstract Decorator class". There's no need to define an abstract Decorator class when you only need to
 * add one responsibility.
 *
 * "Changing the skin of an object versus changing its guts". Decorator attach new responsabilities externally, the
 * Component itselfs does not even know that it's decorated. Strategy extends a Component by replacing some of its
 * behavior, the Component must forward to the Strategy object. Strategy is a good choice when a Component class is
 * heavyweight, making a Decorator intrisically too costly to apply.
 *
 * "A decorator and its component aren't identical". Hence you shouldn't rely on object identity when you use
 * decorators (consequence).
 */
class Decorator implements ComponentInterface
{
    private $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}