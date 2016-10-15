<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/15/16
 * Time: 10:44 PM
 */

namespace AuthWithSlimPHP3\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
      'email',
      'name',
      'password',
    ];


}