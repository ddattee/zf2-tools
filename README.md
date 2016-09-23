ZF2 Tools
=========

This a module add some Zend2 backend managing tools.
With this module you can handle :
- [composer updates](docs/composer.md)
- [cache cleaning](docs/caches.md)
- [translation mo file génération from po](docs/translations.md)
- [running a git update](docs/git.md)

Getting started
---------------

1. Install this module via composer : `composer require ddattee/tools`
2. Check the module configuration to add to your own app the configuration required for each module you want to use

Access
------

You can access the tools interface by adding an IP to the config array and then accessing this URL : domain-of-project/tools/
<pre>
return [
    'tools' => [
        'ips' => [
            'xxx.xxx.xxx.xxx'
        ],
];
</pre>