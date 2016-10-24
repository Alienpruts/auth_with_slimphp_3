<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/23/16
 * Time: 10:32 PM
 */

namespace AuthWithSlimPHP3\Validation\Rules;


use AuthWithSlimPHP3\Models\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule
{

    private $user;

    /**
     * MatchesPassword constructor.
     * @param User $user
     */
    public function __construct($user)
    {
        $this->user = $user;

    }

    public function validate($input)
    {
        return password_verify($input, $this->user->password);
    }
}