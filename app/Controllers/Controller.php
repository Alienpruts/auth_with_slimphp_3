<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/14/16
 * Time: 10:19 PM
 */

namespace AuthWithSlimPHP3\Controllers;

use Slim\Container;

class Controller
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
        throw new \Exception("Property {$property} not found in container");
    }
}