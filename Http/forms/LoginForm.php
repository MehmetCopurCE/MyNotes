<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    public $attributes;
    protected $errors = [];

    function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        if(! Validator::email($this->attributes['email'])){
            $this->errors['email'] = 'Please provide a valid email.';
        }

        if(! Validator::string($this->attributes['password'], 1, 7)){
            $this->errors['password'] = 'Password should be min 1 character and max 7 character.';
        }
    }

    /**
     * @throws ValidationException
     */
    public static function validate($attributes)
    {

        $instance = new static($attributes);

        if ($instance->failed()) {
            $instance->throw();
        }

        return $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw(){
        ValidationException::throw($this->getErrors(), $this->attributes);

    }

    public function failed()
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($key, $value)
    {
        $this->errors[$key] = $value;

        return $this;
    }
}