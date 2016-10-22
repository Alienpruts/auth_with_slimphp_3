<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:40 PM
 */

session_start();

use AuthWithSlimPHP3\Controllers\Auth\AuthController;
use AuthWithSlimPHP3\Controllers\Auth\PasswordController;
use AuthWithSlimPHP3\Controllers\HomeController;
use AuthWithSlimPHP3\Middleware\CsrfViewMiddleware;
use AuthWithSlimPHP3\Middleware\OldInputMiddleware;
use AuthWithSlimPHP3\Middleware\ValidationErrorsMiddleware;
use AuthWithSlimPHP3\Validation\Validator;
use Slim\App;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use AuthWithSlimPHP3\Auth\Auth as Auth;

use Respect\Validation\Validator as v;

require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('Europe/Brussels');

$app = new App([
    'settings' => [
      'displayErrorDetails' => true,
        // This is needed to be able to send a var_dump in a Middleware !
      'addContentLengthHeader' => false,
      'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'authslimphp3',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
      ]
    ],

  ]
);

$container = $app->getContainer();

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['auth'] = function ($container) {
    return new Auth();
};

$container['flash'] = function ($container) {
    return new Messages();
};

$container['view'] = function ($container) {
    $view = new Twig(__DIR__ . '/../resources/views', [
      'cache' => false,
    ]);

    $view->addExtension(new TwigExtension(
      $container->router,
      $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth', [
      'check' => $container->auth->check(),
      'user' => $container->auth->user(),
    ]);

    $view->getEnvironment()->addGlobal('flash', $container->flash);

    return $view;
};

$container['validator'] = function ($container) {
    return new Validator;
};

$container['HomeController'] = function ($container) {
    return new HomeController($container);
};

$container['AuthController'] = function ($container) {
    return new AuthController($container);
};

$container['csrf'] = function ($container) {
    return new Guard();
};

$container['PasswordController'] = function ($container) {
    return new PasswordController($container);
};


$app->add(new ValidationErrorsMiddleware($container));

$app->add(new OldInputMiddleware($container));

$app->add(new CsrfViewMiddleware($container));

$app->add($container['csrf']);

v::with('AuthWithSlimPHP3\\Validation\\Rules\\');

require_once __DIR__ . ' /../app/routes.php';