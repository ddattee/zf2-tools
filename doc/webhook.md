Webhook
=======

The webhook allow you application to self update by running a `git pull` via a http request.
To work the project has to be a working git repository (meaning it has to have a .git folder at the root of your project).

Dependencies
------------

This tool need `ddattee/libs` if you install the tools via composer the dependecy has been solved and install.
Otherwise you need to install this library.

Configuration
-------------

To be able to work the webhook need to be able ro tun the `git pull` command in your project dir with webserver user.
To do that update the rights on your project like this :
```bash
# Go into you projects root where .git dir is located
cd /project/path
# Give the webserver user read-write permissions on .git fodler (assuming you are running your webserver with www-data user)
chgrp -R www-data .git
chmod -R g+rw .git
```

By default the Webhook wil try to pull with default git configuration, meaning it will try to do `git pull origin master:master`.
If you need you can specify wich remote/branches you'd like the webhook to update, for this simply add this configuration into your app `config/autoload/global.php` file.
```php
'tools' => [
    'webhook' => [
        'git'   => [
            'remoteName' => [
                'name'   => 'origin',
                'branch' => 'master'
            ],
            'local' => [
                'branch' => 'master',
            ],
        ],
    ],
]
```

The webhook has first been maid to be called by Gitlab webhook system.
In order to use gitlab webhook token security system you can declare it to your app `config/autoload/global.php` file.
```php
'tools' => [
    'webhook' => [
        'token'   => '',
    ],
]
```
The webhook will then look for gitlab header and if it founds it will verify that the sent token corespond to the one you configured.

Roadmap
-------

