<?php

declare(strict_types=1);

namespace Configuration;

use Application\Controller\Factory\AbstractControllerFactory;
use Laminas\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'config' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/configuration[/:controller[/:action][/:id]]',
                    'defaults' => [
                        '__NAMESPACE__' => 'Configuration\Controller',
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => AbstractControllerFactory::class,
            Controller\ConcurrenceConfigurationController::class => AbstractControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_path_stack' => [
            'Configuration' => __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
