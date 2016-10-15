<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/15/16
 * Time: 11:40 PM
 */

namespace AuthWithSlimPHP3\Controllers\Auth;

use AuthWithSlimPHP3\Controllers\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthController extends Controller
{
    public function getSignUp(Request $req, Response $res)
    {
        return $this->view->render($res, 'auth/signup.twig');
    }

    public function postSignUp(Request $req, Response $res)
    {

    }
}