<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/16/16
 * Time: 9:11 PM
 */

namespace AuthWithSlimPHP3\Middleware;

use Interop\Container\ContainerInterface;

class Middleware
{
    protected $container;

    /**
     * Middleware constructor.
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }


}