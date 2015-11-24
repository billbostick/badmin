This is the badmin readme file. 

edit config\app.php:

    Illuminate\Html\HtmlServiceProvider::class,
    Kodeine\Acl\AclServiceProvider::class,
    Bostick\Badmin\BadminServiceProvider::class,

    'Form'      => Illuminate\Html\FormFacade::class,
    'Html'      => Illuminate\Html\HtmlFacade::class,

php artisan vendor:publish
php artisan migrate

edit app\User.php and add the HasRole trait to your User model:
(see https://github.com/kodeine/laravel-acl/issues/90)

    use Kodeine\Acl\Traits\HasRole;

    use Authenticatable, Authorizable, CanResetPassword, HasRole {
        HasRole::can insteadof Authorizable;
            }


Add the following to your app/Http/Kernel.php

    protected $routeMiddleware = [
        'acl' => \Kodeine\Acl\Middleware\HasPermission::class,
        ];
