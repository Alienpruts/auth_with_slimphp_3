<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/16/16
 * Time: 9:13 PM
 */

namespace AuthWithSlimPHP3\Middleware;


class ValidationErrorsMiddleware extends Middleware
{
    public function __invoke($req, $res, $next)
    {
        if (isset($_SESSION['errors'])) {
            $this->container->view->getEnvironment()
              ->addGlobal('errors', $_SESSION['errors']);
        }
        unset($_SESSION['errors']);

        $res = $next($req, $res);
        return $res;
    }
}