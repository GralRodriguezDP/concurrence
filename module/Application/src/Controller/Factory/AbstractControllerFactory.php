<?php

namespace Application\Controller\Factory;

use Application\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;
use Laminas\Mvc\Exception\InvalidControllerException;
use Laminas\Mvc\I18n\Translator;
use Laminas\ServiceManager\Factory\FactoryInterface;

class AbstractControllerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|void
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        if (!class_exists($requestedName)) {
            throw new InvalidControllerException('Controller not found');
        }

        /* @var $config array */
        $config = $container->get('config');

        /* @var $adapter Adapter */
        $adapter = $container->get(Adapter::class);

        /* @var $translator Translator */
        $translator = $container->get('MvcTranslator');

        /* @var $controller AbstractController */
        $controller = new $requestedName;
        $controller->setAdapter($adapter);
        $controller->setConfig($config);
        return $controller;
    }
}