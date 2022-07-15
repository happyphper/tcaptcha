<?php

namespace Happyphper\TCaptcha\Exceptions;

use Exception;
use Throwable;

class ParamException extends Exception
{
    protected $code = 400;

    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, $this->code, $previous);
    }
}
