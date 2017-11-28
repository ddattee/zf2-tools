Composer
========

The composer tools allow to run a composer update from the tools interface.

System Requirement
------------------

This tool need composer to be installed on the server or a composer.phar must be present at the root of the project.

Also you need to give read-write access to vendro dir to the webserver user.
```bash
mkdir .composer
chgrp -R www-data vendor .composer
chmod -R 775 vendor .composer
```

You can revoke those rights after running the composer update

Roadmap
-------

- [ ] transfert composer logic in a ddattee/libs class
- [ ] download new composer.phar if nothing executable found
- [ ] allow to ask for one package to be updated

