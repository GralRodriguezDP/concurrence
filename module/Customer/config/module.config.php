<?php

declare(strict_types=1);

namespace Customer;

use Application\Controller\Factory\AbstractControllerFactory;
use Laminas\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'customer' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/customer[/:controller[/:action]]',
                    'defaults' => [
                        '__NAMESPACE__' => 'Customer\Controller',
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => AbstractControllerFactory::class,
            Controller\CustomerController::class => AbstractControllerFactory::class,
        ],
        'aliases' => [
            'Customer\Controller\Index' => Controller\IndexController::class,
            'Customer\Controller\Customer' => Controller\CustomerController::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_path_stack' => [
            'Customer' => __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
