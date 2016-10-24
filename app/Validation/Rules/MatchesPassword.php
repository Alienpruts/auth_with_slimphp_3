<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/23/16
 * Time: 10:32 PM
 */

namespace AuthWithSlimPHP3\Validation\Rules;


use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule
{

    private $password;

    public function __construct($password)
    {
        $this->password = $password;

    }

    public function validate($input)
    {
        return password_verify($input, $this->password);
    }
}