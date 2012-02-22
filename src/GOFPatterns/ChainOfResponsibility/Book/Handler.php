<?php

namespace GOFPatterns\ChainOfResponsibility\Book;

/**
 * "Implementing the successor chain". There are two possible ways to implement the successor chain:
 *
 * - Define new links (usually in Handler, parent references in a part-whole hierarchy can define a part's successor)
 * - Use existing links (Using existing links works well when the links support the chain you need) (implementation)
 *
 * "Connecting successors". If there are no preexisting references for defining a chain, then you'll have to introduce
 * them yourself. In that case, the Handler not only defines the interface for the requests but usually maintains the
 * successor as well. That lets the handler provide a default implementation of HandleRequest that forwards the request
 * to the successor (if any). (implementation)
 *
 * "Receipt isn't guaranteed". (consequence)
 *
 * The symfony1 Filter Chain deviates from this general form since it does not is the base class for chainable objects.
 * Instead, it provides a way to register an object into the chain that is called in first-in-first-out (FIFO) order.
 * Any object with an "execute" method can be registered but by default only sfFilter subclasses are registered into
 * the chain (but there are no type checks for this and even the sfFilter class does not have an abstract execute
 * method).
 *
 * Not quoted:
 *
 * - "Automatic forwarding in Smalltalk". Not applicable in PHP. But it seems awkward, even for Smalltalk.
 *
 * See symfony1 sfFilterChain class: https://github.com/symfony/symfony1/blob/1.4/lib/filter/sfFilterChain.class.php
 * See symfony1 sfFilter class: https://github.com/symfony/symfony1/blob/1.4/lib/filter/sfFilter.class.php
 * See symfony1 Filter Chain explained: http://www.symfony-project.org/more-with-symfony/1_4/en/10-Symfony-Internals#chapter_10_the_filter_chain
 */
abstract class Handler
{
    private $sucessor;

    public function __construct(Handler $sucessor = null)
    {
        $this->sucessor = $sucessor;
    }

    /**
     * "Representing requests". Different options are available for representing requests. In the simplest form, the
     * request is a hard-coded operation invocation, as in the case of HandleHelp. This is convenient and safe, but you
     * can forward only the fixed set of requests that the Handler class defines. An alternative is to use a single
     * handler function that takes a request code (e.g., an integer constant or a string) as parameter. This supports an
     * open-ended set of requests. The only requirement is that the sender and receiver agree on how the request should
     * be encoded. A Request class can represent requests explicitly, and new kinds of requests can be defined by
     * subclassing. Subclasses can define different parameters. Handlers must know the kind of request (that is, which
     * Request subclass they're using) to access these parameters. (implementation)
     *
     * The Symfony2 EventDispatcher component is an Observer implementation that uses a kind of enum classes to help
     * the developer to add listeners to a specific event. It remembers the request code used with the single handler
     * function alternative of the Chain of Resposibility. When an event is dispatched, it pass the event object, which
     * clearly resembles the use of the Request to represent requests in Chain of Resposibility.
     *
     * Symfony2 EventDispatcher "request code": http://symfony.com/doc/current/book/internals.html#the-static-events-class
     * Symfony2 EventDispather "Request class": http://symfony.com/doc/current/book/internals.html#dispatch-the-event
     */
    public function handleRequest()
    {
        if (null !== $this->sucessor) {
            $this->sucessor->handleRequest();
        }
    }

    public function canHandleRequest()
    {
        return false;
    }
}