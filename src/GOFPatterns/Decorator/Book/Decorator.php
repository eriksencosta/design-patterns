<?php

namespace GOFPatterns\Decorator\Book;

/**
 * "Omitting the abstract Decorator class". There's no need to define an abstract Decorator class when you only need to
 * add one responsibility. This decorator itself is not abstract. It only defines the interface for the constructor and
 * can be used as a Decorator for a Component object.
 *
 * "Changing the skin of an object versus changing its guts". Decorator attach new responsabilities externally, the
 * Component itselfs does not even know that it's decorated. Strategy extends a Component by replacing some of its
 * behavior, the Component must forward to the Strategy object. Strategy is a good choice when a Component class is
 * heavyweight, making a Decorator intrisically too costly to apply.
 *
 * "Avoids feature-laden classes high up in the hierarchy". Decorator offers a pay-as-you-go approach to adding
 * responsibilities. Instead of trying to support all foreseeable features in a complex, customizable class, you can
 * define a simple class and add functionality incrementally with Decorator objects. Functionality can be composed from
 * simple pieces. As a result, an application needn't pay for features it doesn't use. (consequence)
 *
 * "A decorator and its component aren't identical". Hence you shouldn't rely on object identity when you use
 * decorators. (consequence)
 */
class Decorator implements ComponentInterface
{
    private $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    /**
     * "Interface conformance". A decorator object's interface must conform to the interface of the component it
     * decorates. ConcreteDecorator classes must therefore inherit from a common class (implementation)
     */
    public function operation()
    {
        $this->component->operation();
    }
}