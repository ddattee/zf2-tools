Webhook
=======

The webhook allow you application to self update by running a `git pull` via a http request.

To work the project has to be a working git repository (meaning it has to have a .git folder at the root of your project).

Dependencies
------------

This tool need `ddattee/libs` if you install the tools via composer the dependecy has been solved and install.

Otherwise you need to install this library.

System Requirement
------------------

We will assume that you have git installed and that you're project is already a git working repository.

To be able to work the webhook need to be able ro tun the `git pull` command in your project dir with webserver user.

For that you need two things :

 1. Allow webserver user to contact remote server that contain the repo
 ```bash
 # Create SSH credential for yout webserver user
 sudo -u www-data ssh-keygen -t rsa
 ```
 Then add the public ssh key generated to your allowed ssh key on your central repository server.

 2. Allow webserver user to use current git repository
 ```bash
 # Go into you projects root where .git dir is located
 cd /project/path
 # Give the webserver user read-write permissions on .git fodler (assuming you are running your webserver with www-data user)
 chgrp -R www-data .git
 chmod -R g+rw .git 
 ```


Configuration
-------------

### Branch

By default the Webhook wil try to pull with default git configuration, meaning it will try to do `git pull origin master:master`.

If you need you can specify which remote/branches you'd like the webhook to update, for this simply add this configuration into your app `config/autoload/global.php` file.
```php
'tools' => [
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
    ],
]
```

### Gitlab

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

Usage
-----

You can call the webhook from any browser by going to this address : http(s)//YOURDOMAIN/tools/webhook/update
It is also this URL that you must provide to Gitlab when configuring the webhook on gilatb's side.

Roadmap
-------
