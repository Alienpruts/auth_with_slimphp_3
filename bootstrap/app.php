<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:40 PM
 */

session_start();

use AuthWithSlimPHP3\Controllers\HomeController;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new App([
    'settings' => [
      'displayErrorDetails' => true,
    ]
  ]
);

$container = $app->getContainer();

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

require_once __DIR__ . '/../app/routes.php';