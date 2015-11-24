This is the badmin readme file. This is an edit.

php artisan vendor:publish
php artisan migrate


edit config\app.php:

    Illuminate\Html\HtmlServiceProvider::class,
    Kodeine\Acl\AclServiceProvider::class,
    Bostick\Badmin\BadminServiceProvider::class,

    'Form'      => Illuminate\Html\FormFacade::class,
    'Html'      => Illuminate\Html\HtmlFacade::class,


edit app\User.php and add the HasRole trait to your User model:

    use Kodeine\Acl\Traits\HasRole;

    class User extends Model implements AuthenticatableContract, CanResetPasswordContract
    {
        use Authenticatable, CanResetPassword, HasRole;
    }

Add the following to your app/Http/Kernel.php

    protected $routeMiddleware = [
        'acl' => \Kodeine\Acl\Middleware\HasPermission::class,
        ];
