# Badmin

Badmin provides a simple admin interface for the authentication features that are built into Laravel 5.1, as well as the Laravel ACL package (https://github.com/kodeine/laravel-acl). The screens are based on Bootstrap and jQuery.

# Table of Contents
* [Requirements and Dependencies](#requirements)
* [Use](#use)


# <a name="requirements"></a>Requirements and Dependencies:

This package requires PHP 5.5.9 or greater. It has dependencies on the  Illuminate/HTML and Kodeine/Laravel-ACL packages.

Installation:

These instructions describe the installation of Badmin, Laravel-ACL, and the Illuminate/HTML package. If you already have either of the dependant packages installed, you may have already performed some of these steps.

1. Use composer to require the package:

```
$ composer require bostick/badmin:dev-master@dev
```

2. Add the service provides for HTML, Laravel-Acl, and Badmin to config/app.php:

 ```php
    'providers' => [
    ...
    Illuminate\Html\HtmlServiceProvider::class,
    Kodeine\Acl\AclServiceProvider::class,
    Bostick\Badmin\BadminServiceProvider::class,
    ...
```

3. Add the aliases for HTML to config/app.php:

```php
  'aliases' => [
    ...
    'Form'      => Illuminate\Html\FormFacade::class,
    'Html'      => Illuminate\Html\HtmlFacade::class,
    ...
```

4. Add the HasRole trait to your User model (app/User.php). Note this issue at https://github.com/kodeine/laravel-acl/issues/90. The following code works with the current release of Laravel-ACL.

```php
  use Kodeine\Acl\Traits\HasRole;

  ...
  
  class User extends Model implements AuthenticatableContract,
                                      AuthorizableContract,
                                      CanResetPasswordContract

  {
    use Authenticatable, Authorizable, CanResetPassword, HasRole {
      HasRole::can insteadof Authorizable;
  }
```                                                                                                  
5. Use artisan to publish package features:

```
  $ php artisan vendor:publish
```

6. Use artisan to run the migration scripts:

```
  $ php artisan migrate
```

7. Add the following to your app/Http/Kernel.php

```php
    protected $routeMiddleware = [
        'acl' => \Kodeine\Acl\Middleware\HasPermission::class,
        ];
```

# <a name="use"></a>Use:

Once it is installed, Badmin will provide primary views at the following routes:

```
  login
  logout
  register
  password/email
  admin/user
  admin/permission
  admin/role
  admin/access
```


