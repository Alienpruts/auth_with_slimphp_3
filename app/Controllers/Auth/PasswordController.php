<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/22/16
 * Time: 8:25 AM
 */

namespace AuthWithSlimPHP3\Controllers\Auth;


use AuthWithSlimPHP3\Controllers\Controller;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

/**
 * @property Twig view
 */
class PasswordController extends Controller
{
    public function getChangePassword(Request $req, Response $res)
    {
        return $this->view->render($res, 'auth/password/change.twig');
    }

    public function postChangePassword(Request $req, Response $res)
    {

    }
}