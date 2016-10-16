<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 10/16/16
 * Time: 5:59 PM
 */

namespace AuthWithSlimPHP3\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;


use Slim\Http\Request;

class Validator
{
    protected $errors;

    public function validate(Request $req, array $rules)
    {
        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(ucfirst($field))->assert($req->getParam($field));
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }
        }

        $_SESSION['errors'] = $this->errors;

        return $this;
    }

    public function failed()
    {
        return !empty($this->errors);
    }

}