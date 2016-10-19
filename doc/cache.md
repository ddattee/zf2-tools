Cache Manager
=============

The cache manager allow you to rapidly clean application cache storage.
Currently the tools only support filesystem cache cleaning.

Dependencies
------------

This tool need `ddattee/libs` to work. 

If you install the tools via composer the dependecy has been resolved and installed.
Otherwise you need to install this library via composer.

Configuration
-------------

To start using the chache tool simply add this configuration (according to your app settings) to your `config/autoload/global.php` file.
```php
'tools' => [
    'cache_manager' => [
        'caches' => [
            [
                'type' => 'Filesystem',
                'path' => 'PATH/TO/CACHE/FOLDER'
            ]
        ],
    ],
]
```

The cache must be handled by Zend Framewrok cache system.
The tool will try to initialize a Zend cache adapter on these caches to allow cleaning.

As of now the cache manager only allow to wipe out the cache storage.

Roadmap
-------

- [] add tag cleaning
- [] add refresh cache
