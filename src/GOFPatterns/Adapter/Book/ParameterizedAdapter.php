<?php

namespace GOFPatterns\Adapter\Book;

use InvalidArgumentException;

/**
 * "Pluggable adapters, (c) parameterized adapters": the book shows a SmallTalk example, using the Block construct. This
 * is an adapted example using an array to map the Adapter interface to the Adaptee interface. (implementation)
 */
class ParameterizedAdapter implements Target
{
    private $adaptee;
    private $interfaceMap = array();

    public function __construct($adaptee, array $interfaceMap)
    {
        if (!is_object($adaptee)) {
            throw new InvalidArgumentException('$adaptee must be an object!');
        }

        if (0 === count($interfaceMap)) {
            throw new InvalidArgumentException('$interfaceMap must have a map of the Adaptee interface methods.');
        }

        $interfaceMethods = array_keys($interfaceMap);
        $interfaceDiff = array_diff($interfaceMethods, array('request'));

        if (0 !== count($interfaceDiff)) {
            throw new InvalidArgumentException('$interfaceMap does not map the following Adapter methods: ' . implode(', ', $interfaceDiff));
        }

        $this->adaptee = $adaptee;
        $this->interfaceMap = $interfaceMap;
    }

    public function request()
    {
        $method = $this->interfaceMap['request'];

        return $this->adaptee->$method();
    }
}