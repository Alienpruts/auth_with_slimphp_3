<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/17/16
 * Time: 9:23 PM
 */

namespace AuthWithSlimPHP3\Validation\Exceptions;


use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException
{
    public static $defaultTemplates = [
      self::MODE_DEFAULT => [
        self::STANDARD => 'Email is already taken',
      ],
    ];

}