# Mangopay API for PHP

This library provides a simple API to communicate with [Mangopay](http://www.mangopay.com/)

# Installing via Composer

The recommended way to install is through [Composer](http://composer.org).

```sh
# Install Composer
$ curl -sS https://getcomposer.org/installer | php

# Add easypay-php as a dependency
$ php composer.phar require gordalina/mangopay:~0.0
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

# Testing

This library uses [PHPUnit](https://github.com/sebastianbergmann/phpunit).
In order to run the unit tests, you'll first need to install the development
dependencies of the project using Composer:

```sh
$ php composer.phar install --dev
```

You can then run the tests using phpunit

```sh
$ bin/phpunit
```

If you want to run integration tests you have to copy `phpunit.xml.dist` to
`phpunit.xml` then insert your credentials and set `MANGOPAY_RUN_INTEGRATION_TESTS`
to `true`.

Then run phpunit

```sh
$ bin/phpunit --exclude-group none
```

# License

This library is under the MIT License, see the complete license [here](LICENSE)
