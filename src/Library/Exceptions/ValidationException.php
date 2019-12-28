<?php

namespace Aleksa\Library\Exceptions;

use Exception;

class ValidationException extends Exception
{
    protected array $errors;

    public function __construct(array $errors = [], $message = "ValidationException")
    {
        parent::__construct($message, 400, null);

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
