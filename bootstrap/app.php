<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:40 PM
 */

session_start();

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require_once __DIR__ . '/../vendor/autoload.php';

$user = new AuthWithSlimPHP3\Models\User;
var_dump($user);
die();

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

require_once __DIR__ . '/../app/routes.php';