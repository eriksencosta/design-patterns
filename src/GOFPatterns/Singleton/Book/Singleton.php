<?php

namespace GOFPatterns\Singleton\Book;

/**
 * Singleton is maybe the most overused design pattern. Personally I don't think they are needed, mainly when there is
 * a Dependency Injection container available to use. And even Erich Gamma thinks it should be dropped (1).
 *
 * The criticism regarding Singleton can differ for different languages (like in PHP, a language with shared nothing
 * architecture, where objects live in a request (2)) or by issues like testing (3).
 *
 * Quoted in other classes:
 *
 * - "Subclassing the Singleton class". See SingletonRegistry. (implementation)
 *
 * (1) Design Patterns 15 Years Later: An Interview: http://www.informit.com/articles/article.aspx?p=1404056
 * (2) Why Singletons have no use in PHP: http://gooh.posterous.com/singletons-in-php
 * (3) Robert Martin's Just Use One: http://butunclebob.com/ArticleS.UncleBob.SingletonVsJustCreateOne
 */
class Singleton
{
    /**
     * "Ensuring a unique instance" in PHP, we need to change the visibility of the constructor and clone methods.
     * (implementation)
     */
    static private $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    static public function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}