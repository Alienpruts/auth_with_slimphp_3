<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:49 PM
 */

$app->get('/', 'HomeController:index');
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');