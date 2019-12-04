<?php

namespace Dictionary\Library\Exceptions;

use Exception;
use Throwable;

class DBException extends Exception
{
    public function __construct($message = "DB Error")
    {
        parent::__construct($message, 500, null);
    }
}
