<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 10:02 PM
 */

namespace AuthWithSlimPHP3\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{

    public function index(Request $req, Response $res)
    {

        // This is not good practice, accessing fields via magic method.
        // But for now, it will do.
        return $this->view->render($res, 'home.twig');
    }
}
