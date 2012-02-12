<?php

namespace GOFPatterns\Test\Iterator\Book;

use GOFPatterns\Iterator\Book;
use PHPUnit_Framework_TestCase;

class IteratorTest extends PHPUnit_Framework_TestCase
{
    public function testPattern()
    {
        $elements = range(0, 100, 10);

        $aggregate = new Book\ConcreteAggregate($elements);
        $iterator = $aggregate->createIterator();

        $assertIndex = 0;
        for ($iterator->first(); !$iterator->isDone(); $iterator->next()) {
            $currentItem = $iterator->currentItem();

            $this->assertEquals($elements[$assertIndex], $currentItem);
            $assertIndex++;
        }
    }

    public function testPatternComposite()
    {
        $leafA = new Book\Leaf('leafA');
        $leafB = new Book\Leaf('leafB');
        $leafE = new Book\Leaf('leafE');

        $rootB = new Book\Composite('rootB');
        $leafC = new Book\Leaf('leafC');
        $leafD = new Book\Leaf('leafD');
        $rootB->add($leafC);
        $rootB->add($leafD);

        $rootC = new Book\Composite('rootC');
        $leafF = new Book\Leaf('leafF');
        $leafG = new Book\Leaf('leafG');
        $rootC->add($leafF);
        $rootC->add($leafG);

        $rootB->add($rootC);

        $root  = new Book\Composite('root');
        $root->add($leafA);
        $root->add($rootB);
        $root->add($leafB);
        $root->add($leafE);

        $iterator = new Book\PreorderIterator($root);

        $elements = array(
            'leafA',
            'rootB',
              'leafC',
              'leafD',
              'rootC',
                'leafF',
                'leafG',
            'leafB',
            'leafE'
        );

        $assertIndex = 0;
        for (
            $iterator->first();
            !$iterator->isDone();
            $iterator->next()
        ) {
            $currentItemName = $iterator->currentItem()->getName();

            $this->assertEquals($elements[$assertIndex], $currentItemName);
            $assertIndex++;
        }
    }
}