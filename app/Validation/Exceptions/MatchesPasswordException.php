<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/23/16
 * Time: 10:37 PM
 */

namespace AuthWithSlimPHP3\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException
{
    public static $defaultTemplates = [
      self::MODE_DEFAULT => [
        self::STANDARD => 'Password does not match',
      ],
    ];
}