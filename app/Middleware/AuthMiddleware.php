<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/24/16
 * Time: 10:37 PM
 */

namespace AuthWithSlimPHP3\Middleware;


use Slim\Http\Request;
use Slim\Http\Response;

class AuthMiddleware extends Middleware
{
    public function __invoke(Request $req, Response $res, $next)
    {
        if (!$this->container->get('auth')->check()) {
            $this->container->get('flash')->addMessage('error', 'Please sign in before doing that');
            return $res->withRedirect($this->container->get('router')->pathFor('auth.signin'));
        }

        $res = $next($req, $res);
        return $res;
    }

}