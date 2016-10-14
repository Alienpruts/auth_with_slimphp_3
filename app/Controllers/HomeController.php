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

class HomeController
{
    public function index(Request $req, Response $res)
    {
        return 'Home Controller';
    }
}