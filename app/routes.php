<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 8:49 PM
 */

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/home', function (Request $req, Response $res) {
    return $this->view->render($res, 'home.twig');
});