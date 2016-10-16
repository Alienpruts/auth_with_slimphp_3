<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/16/16
 * Time: 9:11 PM
 */

namespace AuthWithSlimPHP3\Middleware;

class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }


}