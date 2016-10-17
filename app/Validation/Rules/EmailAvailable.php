<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/17/16
 * Time: 9:08 PM
 */

namespace AuthWithSlimPHP3\Validation\Rules;

use AuthWithSlimPHP3\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule
{

    public function validate($input)
    {
        return User::where('email', $input)->count() === 0;
    }
}