<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/24/16
 * Time: 11:02 PM
 */

namespace AuthWithSlimPHP3\Middleware;


use Slim\Http\Request;
use Slim\Http\Response;

class GuestMiddleware extends Middleware
{
    public function __invoke(Request $req, Response $res, $next)
    {
        if ($this->container->get('auth')->check()) {
            $this->container->get('flash')
              ->addMessage('error', 'You are already signed in');
            return $res->withRedirect($this->container->get('router')
              ->pathFor('home'));
        }

        $res = $next($req, $res);
        return $res;
    }

}