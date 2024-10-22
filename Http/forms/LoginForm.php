<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {

        if(! Validator::email($email)){
            $this->errors['email'] = 'Please provide a valid email.';
        }

        if(! Validator::string($password, 1, 7)){
            $this->errors['password'] = 'Password should be min 1 character and max 7 character.';
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }
}