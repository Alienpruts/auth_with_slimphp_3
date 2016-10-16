<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:40 PM
 */

session_start();

use AuthWithSlimPHP3\Controllers\Auth\AuthController;
use AuthWithSlimPHP3\Controllers\HomeController;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('Europe/Brussels');

$app = new App([
    'settings' => [
      'displayErrorDetails' => true,
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

$container['view'] = function ($container) {
    $view = new Twig(__DIR__ . '/../resources/views', [
      'cache' => false,
    ]);

    $view->addExtension(new TwigExtension(
      $container->router,
      $container->request->getUri()
    ));

    return $view;
};

$container['HomeController'] = function ($container) {
    return new HomeController($container);
};

$container['AuthController'] = function ($container) {
    return new AuthController($container);
};

require_once __DIR__ . ' /../app/routes.php';