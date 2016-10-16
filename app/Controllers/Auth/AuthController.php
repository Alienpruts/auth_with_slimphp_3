<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/15/16
 * Time: 11:40 PM
 */

namespace AuthWithSlimPHP3\Controllers\Auth;

use AuthWithSlimPHP3\Controllers\Controller;
use AuthWithSlimPHP3\Models\User;
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
        $user = User::create([
          'email' => $req->getParam('email'),
          'name' => $req->getParam('name'),
          'password' => password_hash($req->getParam('password'),
            PASSWORD_DEFAULT, ['cost' => 10])
        ]);

        return $res->withRedirect($this->router->pathFor('home'));
    }
}