<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/18/16
 * Time: 10:23 PM
 */

namespace AuthWithSlimPHP3\Auth;


use AuthWithSlimPHP3\Models\User;

class Auth
{
    public function attempt($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user->id;
            return true;
        }

        return false;
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    /**
     * @return User
     */
    public function user()
    {
        if (!isset($_SESSION['user'])) {
            return false;
        }
        return User::find($_SESSION['user']);

    }

    public function logout()
    {
        unset($_SESSION['user']);
    }
}