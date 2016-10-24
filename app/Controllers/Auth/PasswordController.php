<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/22/16
 * Time: 8:25 AM
 */

namespace AuthWithSlimPHP3\Controllers\Auth;


use AuthWithSlimPHP3\Auth\Auth;
use AuthWithSlimPHP3\Controllers\Controller;
use AuthWithSlimPHP3\Validation\Validator;
use Slim\Flash\Messages;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Router;
use Slim\Views\Twig;
use Respect\Validation\Validator as v;

/**
 * @property Twig view
 * @property Validator validator
 * @property Auth auth
 * @property Messages flash
 * @property Router router
 */
class PasswordController extends Controller
{
    public function getChangePassword(Request $req, Response $res)
    {
        return $this->view->render($res, 'auth/password/change.twig');
    }

    public function postChangePassword(Request $req, Response $res)
    {
        $validation = $this->validator->validate($req, [
          'password_old' => v::noWhitespace()
            ->notEmpty()
            ->matchesPassword($this->auth->user()),
          'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($validation->failed()) {
            return $res->withRedirect($this->router->pathFor('auth.password.change'));
        }

        $this->auth->user()->setPassword($req->getParam('password'));

        $this->flash->addMessage('info', 'Your password was changed');

        return $res->withRedirect($this->router->pathFor('auth.password.change'));
    }
}