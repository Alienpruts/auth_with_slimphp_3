<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:49 PM
 */

use AuthWithSlimPHP3\Middleware\AuthMiddleware;

$app->get('/', 'HomeController:index')->setName('home');
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');
$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app->post('/auth/signin', 'AuthController:postSignIn');

$app->group('', function () use ($app) {
    $this->get('/auth/signout', 'AuthController:getSignOut')
      ->setName('auth.signout');
    $this->get('/auth/password/change', 'PasswordController:getChangePassword')
      ->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));

