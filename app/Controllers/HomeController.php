<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 10:02 PM
 */

namespace AuthWithSlimPHP3\Controllers;

use AuthWithSlimPHP3\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{

    public function index(Request $req, Response $res)
    {

        // Will create a new user, but only if the User model defined fillable
        // property.
        User::create([
          'name' => 'Berten',
          'email' => 'boem@boem.be',
          'password' => '123',
        ]);

        $user = User::find(1);
        var_dump($user->email);
        die();
        // This is not good practice, accessing fields via magic method.
        // But for now, it will do.
        return $this->view->render($res, 'home.twig');
    }
}
