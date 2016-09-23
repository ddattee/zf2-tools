Cache Managment
===============

To use the cache manager simply declare your cache storage in your config :
<pre>
return 'tools' => [
    'cache_manager' => [
        'caches' => [
            [
                'type' => 'Filesystem',
                'path' => 'PATH/TO/CACHE/FOLDER'
            ],
        ],
    ],
];
</pre>

The cache manager only handle Zend 2 Filesystem cache storage. 