<?php

namespace GOFPatterns\Proxy\Book;

/**
 * This proxy uses the available PHP language features (using the new operator with a string class name to create an
 * instance of the class and PHP overloading) to create a generic proxy like the GoF book 'doesNotUnderstand'
 * SmallTalk or the 'overloading -> in C++' example.
 *
 * A disadvantage of a generic proxy is that it can't cache much data of a subject since it does not know the subject.
 *
 * "Proxy doesn't always have to know the type of real subject". If a Proxy class can deal with its subject solely
 * through an abstract interface, then there's no need to make a Proxy class for each RealSubject class; the proxy can
 * deal with all RealSubject classes uniformly. But if Proxies are going to instantiate RealSubjects (such as in a
 * virtual proxy), then they have to know the concrete class. (implementation)
 */
class GenericProxy
{
    private $subjectClass;
    private $subjectId;
    private $subject;

    public function __construct($subjectClass, $subjectId)
    {
        $this->subjectClass = $subjectClass;
        $this->subjectId = $subjectId;
    }

    /**
     * PHP overloading.
     *
     * @see http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     * @see http://php.net/manual/en/function.call-user-func-array.php
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->__load(), $name), $arguments);
    }

    public function __load()
    {
        if (null === $this->subject) {
            $this->subject = new $this->subjectClass($this->subjectId);
        }

        return $this->subject;
    }
}