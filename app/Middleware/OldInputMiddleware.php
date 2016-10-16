<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/16/16
 * Time: 9:58 PM
 */

namespace AuthWithSlimPHP3\Middleware;


class OldInputMiddleware extends Middleware
{
    public function __invoke($req, $res, $next)
    {

        if (isset($_SESSION['old'])) {
            $this->container->view->getEnvironment()
              ->addGlobal('old', $_SESSION['old']);
        }

        $_SESSION['old'] = $req->getParams();
        unset ($_SESSION['old']['password']);

        $res = $next($req, $res);
        return $res;
    }

}