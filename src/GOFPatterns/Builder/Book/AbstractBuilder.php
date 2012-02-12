<?php

namespace GOFPatterns\Builder\Book;

/**
 * "Assembly and construction interface" builders construct their products in step-by-step fashion. Therefore the
 * Builder class interface must be general enough to allow the construction of products for all kinds of concrete
 * builders. (implementation)
 *
 * "Why no abstract class for products?" in the common case, the products produced by the concrete builders differ so
 * greatly in their representation that there is little to gain from giving different products a common parent class.
 * See ProductA and ProductB classes. (implementation)
 *
 * "Empty methods as default in Builder" in C++, the build methods are intentionally not declared pure virtual member
 * functions. They're defined as empty methods instead, letting clients override only the operations they're interested
 * in. (implementation)
 *
 * The Symfony Form's FormBuilder and the Doctrine DBAL QueryBuilder are good examples of builders. Both have an
 * assembly and construction interface for tree structures (Symfony FormBuilder is a Composite) that let the director or
 * client access the child nodes of the tree structure.
 *
 * In Symfony Form's FormBuilder, the interface also lets the removal of internal nodes with the remove() method. The
 * get() method returns a child node of the tree. Internally it uses an Abstract Factory (a FormFactoryInterface
 * instance) to create the different Form objects (see the create() method).
 *
 * The Doctrine DBAL QueryBuilder uses some arrays to track the assembly process. See the properties $sqlParts, $params
 * and $paramTypes.
 *
 * Symfony Form's FormBuilder class: https://github.com/symfony/symfony/blob/master/src/Symfony/Component/Form/FormBuilder.php
 * Doctrine DBAL QueryBuilder class: https://github.com/doctrine/dbal/blob/master/lib/Doctrine/DBAL/Query/QueryBuilder.php
 */
abstract class AbstractBuilder
{
    public function buildProduct()
    {
        return $this;
    }

    public function buildPart()
    {
        return $this;
    }
}