<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Tools\Controller\Index'   => 'Tools\Controller\IndexController',
            'Tools\Controller\Utils'   => 'Tools\Controller\UtilsController',
            'Tools\Controller\Caches'  => 'Tools\Controller\CachesController',
            'Tools\Controller\Webhook' => 'Tools\Controller\WebhookController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'tools' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/tools/[:controller[/:action]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Tools\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                )
            )
        )
    ),
    'module_layouts' => array(
        'Tools' => 'layout/clean.phtml'
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'tools' => __DIR__ . '/../view',
        ),
    ),
    'cache_manager' => array(
        'caches' => array(),
    ),
    'tools' => array(
        'ips' => array(),
        'exclude_ip_control' => array(
            '/tools/webhook/update'
        ),
        'webhook' => array(
            'token' => ''
        )
    )
);
