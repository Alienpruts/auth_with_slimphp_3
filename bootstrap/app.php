<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:40 PM
 */

session_start();

use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new App([
  'settings' => [
    'displayErrorDetails' => TRUE,
  ]
]
);

require_once __DIR__ . '/../app/routes.php';