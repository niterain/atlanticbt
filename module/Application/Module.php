<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Cache\StorageFactory;
use Zend\Session\SaveHandler\Cache;
use Zend\Session\SessionManager;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        // :: Setting up doctrine

        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $em = $e->getApplication()->getServiceManager()->get('Doctrine\ORM\EntityManager');
        $platform = $em->getConnection()->getDatabasePlatform();

        // Setting up the types that doctrine does not come out of the box supporting
        $platform->registerDoctrineTypeMapping('enum', 'string');

        // :: Set up sessions to save via memcached

        $cache = $e->getApplication()->getServiceManager()->get('memcached');
        $saveHandler = new Cache($cache);
        $manager = new SessionManager();
        $manager->setSaveHandler($saveHandler);

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
