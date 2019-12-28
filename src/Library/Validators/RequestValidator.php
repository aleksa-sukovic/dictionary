<?php

namespace Aleksa\Library\Validators;

use Aleksa\Library\Exceptions\ValidationException;

class RequestValidator
{
    public function validate($rules, $params)
    {
        session_start();
        $errors = [];

        foreach ($rules as $rule => $message) {
            if (!array_key_exists($rule, $params) || !$params[$rule]) {
                $errors[$rule] = $message;
            }
        }

        $_SESSION['errors'] = $errors;
        session_write_close();
        return $errors;
    }

    public function validateWithThrow($rules, $params)
    {
        $errors = $this->validate($rules, $params);

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
    }
}
