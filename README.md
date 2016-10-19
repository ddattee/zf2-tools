ZF2 Tools
=========

This tools are intended to help ZF2 site administrator to handle some core task of the application.

These tools include some functionnality for :

- [cache cleaning](doc/cache.md)
- [composer update](doc/composer.md)
- [.mo translation file generation](doc/translation.md)
- [webhook for auto update the application](doc/webhook.md)

For each functionnality that interest you please see requirement on each doc before trying to use those tools

Getting Started
---------------

The tools are to be added to your application via composer :
`composer require ddattee/tools dev-master`

Then add some IP to your `config/autoload/global.php` file to allow access to tools interface :
```php
'tools' => [
    'ips' => [
        '127.0.0.1', 
        'x.x.x.x' // Replace x.x.x.x by any neede IP
    ]
]
```

Go to http://YOUR-APP-DOMAIN/tools/ to access the tools managment interface.

Good To Know
------------

One you have access to the tools web interface you still need to configure the different tools you want to use.
For this refer to the tools documentation you want to configure at the beginning of this doc.

Roadmap
-------

[] detect if requirements are met before displaying any tool
