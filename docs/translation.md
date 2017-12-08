Translations
============

The translation tools allow to generate .mo file from any .po files found in configured location.

It allows to edit .po file on the fly from any text editor and update .mo after edition.

Dependencies
------------

This tool need `ddattee/libs` to work. 

If you install the tools via composer the dependecy has been resolved and installed.

Otherwise you need to install this library via composer.

Configuration
-------------

To start using the translation tool simply add this configuration (according to your app settings) to your `config/autoload/global.php` file.
```php
'tools' => [
    'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => 'PATH/TO/YOUR/PO/FILES'
            ]
        ],
    ],
]
```

The translator tool only support Getext conversion for now.

Roadmap
-------

