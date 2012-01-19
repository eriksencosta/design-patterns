<?php

namespace GOFPatterns\AbstractFactory\Book;

use InvalidArgumentException;

/**
 * "Creating the products" states that the default simple implementation of AbstractFactory requires a new concrete
 * factory subclass foreach product family, even if product families differ slightly.
 *
 * There are two alternatives:
 *
 * - Prototype: the concrete factory is initialized with a prototypical instance of each product in the family and each
 *   new product is created by cloning the prototype. (language independent)
 * - Class-based: You can store classes inside a concrete factory that create the various concrete products in
 *   variables, much like prototype. These classes create new instances on behalf of the concrete factory. (only in
 *   languages where classes are 1st class objects)
 *
 * In this example we have a map of classes statically but the implementation explained in the GoF book clearly states
 * that the concrete factory must be initialized with "prototypes" or "classes" of products.
 *
 * The Doctrine DBAL Type factory method initially uses a static map of classes and provides an interface to add more
 * types (see addType method). It's not an Abstract Factory however.
 *
 * The Symfony FormFactory class have a map of classes that is loaded through the passes FormExtensionInterface
 * extensions instances in the constructor. Everytime a type is queried and is not found in this map, the extensions map
 * is searched for the requested type and the result is cached. The Symfony FormFactory is an AbstractFactory since
 * families of products objects (FormTypeInterface) can be created without specifying their concrete classes. See the
 * getType() and loadType() methods.
 *
 * Doctrine DBAL Type class: https://github.com/doctrine/dbal/blob/master/lib/Doctrine/DBAL/Types/Type.php
 * Symfony FormFactory class: https://github.com/symfony/symfony/blob/master/src/Symfony/Component/Form/FormFactory.php
 */
class AlternativeFactory
{
    static private $productClasses = array(
        'productA' => 'GOFPatterns\AbstractFactory\Book\FamilyA\Product',
        'productB' => 'GOFPatterns\AbstractFactory\Book\FamilyB\Product',
    );

    /**
     * "Defining extensible factories". Not a problem in PHP. Closely related with the above comments.
     */
    public function create($productName)
    {
          if (isset(self::$productClasses[$productName])) {
              return new self::$productClasses[$productName]();
          }

          throw new InvalidArgumentException('The product named '.$productName.' does not exist!');
    }
}