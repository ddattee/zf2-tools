<?php
/**
 * Tools default config
 *
 * @category  config
 * @package   config
 * @author    David Dattée <david.dattee@gmail.com>
 * @copyright 2016 David Dattée
 * @license   MIT License (MIT)
 */
return [
    'controllers' => [
        'invokables' => [
            'Tools\Controller\Index'   => 'Tools\Controller\IndexController',
            'Tools\Controller\Utils'   => 'Tools\Controller\UtilsController',
            'Tools\Controller\Caches'  => 'Tools\Controller\CachesController',
            'Tools\Controller\Webhook' => 'Tools\Controller\WebhookController',
        ],
    ],
    'router' => [
        'routes' => [
            'tools' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/tools/[:controller[/:action]]',
                    'defaults' => [
                        '__NAMESPACE__' => 'Tools\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ],
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ],
                ],
            ],
        ],
    ],
    'module_layouts' => [
        'Tools' => 'layout/clean.phtml'
    ],
    'view_manager' => [
        'template_path_stack' => [
            'tools' => __DIR__ . '/../view',
        ],
    ],
    'tools' => [
        'ips' => [],
        'exclude_ip_control' => [
            '/tools/webhook/update'
        ],
        'cache_manager' => [
            'caches' => [],
        ],
        'translator' => [
            'translation_file_patterns' => [
                [
                    'type'     => 'gettext',
                    'base_dir' => 'PATH/TO/YOUR/PO/FILES'
                ]
            ],
        ],
        'webhook' => [
            'git'   => [
                'remote' => [
                    'name'   => 'origin',
                    'branch' => 'master'
                ],
                'local' => [
                    'branch' => 'master',
                ],
            ],
            'token' => ''
        ],
    ],
];
