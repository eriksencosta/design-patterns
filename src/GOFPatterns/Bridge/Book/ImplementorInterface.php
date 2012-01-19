<?php

namespace GOFPatterns\Bridge\Book;

/**
 * "Only one Implementor". In situations where there's only one implementation, creating an abstract Implementor class
 * isn't necessary. This is a degenerate case of the Bridge pattern; there's a one-to-one relationship between
 * Abstraction and Implementor. Nevertheless, this separation is still useful when a change in the implementation of a
 * class must not affect its existing clients — that is, they shouldn't have to be recompiled, just relinked.
 *
 * The Symfony Bridge namespace shows have some examples of the Bridge design pattern altough some resembles the
 * "Using multiple ineritance" implementation issue. Surely is not multiple as PHP itself does not support multiple
 * inheritance. As an example, take Symfony\Bridge\Monolog\Logger class. It extends from Monolog\Logger and implements
 * the interfaces Symfony\Component\HttpKernel\Log\LoggerInterface and
 * Symfony\Component\HttpKernel\Log\DebugLoggerInterface. The LoggerInterface is the Abstract while Logger is the
 * Implementor. It's also a "Only one Implementor" case, it's a degenerate case of the Bridge pattern. Even if the
 * original Monolog\Logger class does not implement the Symfony LoggerInterface, both the Framework and the library
 * still can vary independently.
 *
 * "Improved extensibility". You can extend the Abstraction and Implementor hierarchies independently. (consequence)
 * "Hiding implementation details from clients". (consequence)
 *
 * Symfony Bridge Logger class: https://github.com/symfony/symfony/blob/master/src/Symfony/Bridge/Monolog/Logger.php
 * Symfony Logger interface: https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpKernel/Log/LoggerInterface.php
 * Monolog Logger class: https://github.com/Seldaek/monolog/blob/master/src/Monolog/Logger.php
 * Symfony Bridge decision: http://trac.symfony-project.org/wiki/SfliveParisDevMeeting
 */
interface ImplementorInterface
{
    function operationImpl();
}