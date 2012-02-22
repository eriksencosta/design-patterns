<?php

namespace GOFPatterns\Proxy\Book;

/**
 * This is a  virtual proxy example (see applicability). This can be thought as a remote proxy too, since it will "load"
 * a subject from another address space (it can be in the phisycal memory, in a database, in a NFS attached drive).
 *
 * There are four types of proxy: remote, virtual, protection and smart reference.
 *
 * Proxy forwards requests to RealSubject when appropriate, depending on the kind of proxy. (collaboration)
 *
 * "Proxy doesn't always have to know the type of real subject". If a Proxy class can deal with its subject solely
 * through an abstract interface, then there's no need to make a Proxy class for each RealSubject class; the proxy can
 * deal with all RealSubject classes uniformly. But if Proxies are going to instantiate RealSubjects (such as in a
 * virtual proxy), then they have to know the concrete class. (implementation)
 *
 * Not quoted:
 *
 * - "Overloading the member access operator in C++". See GenericProxy class. (implementation)
 * - "Using doesNotUnderstand in Smalltalk". See GenericProxy class. (implementation)
 *
 * Also quoted in other classes:
 *
 * - "Proxy doesn't always have to know the type of real subject". See GenericProxy class.
 *
 * The Doctrine ORM and ODM proxies have virtual mocks for the mapped entities/documents. Instead of using a generic
 * proxy, they generate code for the proxies, extending the entity/document class. The identity (only for non-composite
 * key) is cached and when a getter/setter is invoked, it loads the entity/document and stores the reference.
 *
 * When a composite key is used, the respective UnitOfWork loads the entity/document directly, without using a proxy.
 *
 * See Doctrine ORM and ODM (MongoDB and CouchDB) ProxyFactory class:
 *
 * - ORM: https://github.com/doctrine/doctrine2/blob/master/lib/Doctrine/ORM/Proxy/ProxyFactory.php
 * - MongoDB: https://github.com/doctrine/mongodb-odm/blob/master/lib/Doctrine/ODM/MongoDB/Proxy/ProxyFactory.php
 * - CouchDB: https://github.com/doctrine/couchdb-odm/blob/master/lib/Doctrine/ODM/CouchDB/Proxy/ProxyFactory.php
 */
class Proxy implements Subject
{
    private $subject;
    private $subjectId;

    /**
     * "Another implementation issue involves how to refer to the subject before it's instantiated. Some proxies have to
     * refer to their subject whether it's on disk or in memory. That means they must use some form of address space-
     * independent object identifiers." (implementation)
     */
    public function __construct($aSubjectId)
    {
        $this->subjectId = $aSubjectId;
    }

    public function request()
    {
        return $this->__load()->request();
    }

    /**
     * This would be private but it's public for example testing purpose (via PHPUnit mock API). So we use the PHP
     * magic methods convention :)
     */
    public function __load()
    {
        if (null === $this->subject) {
            // remote, virtual, protection, smart reference
            // It would load from some external data source, like a database, filesystem or any other different address
            // space. Here we just creates the subject instance - but this is not what a Proxy do!
            $this->subject = new RealSubject($this->subjectId);
        }

        return $this->subject;
    }
}