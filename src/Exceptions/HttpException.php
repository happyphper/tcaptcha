<?php

namespace Happyphper\TCaptcha\Exceptions;

use Exception;
use Throwable;

class HttpException extends Exception
{
    protected $code = 500;

    protected string $requestId;

    public function __construct($message = "", string $requestId = "", Throwable $previous = null)
    {
        $this->requestId = $requestId;

        parent::__construct($message, $this->code, $previous);
    }

    public function getRequestId(): string
    {
        return $this->requestId;
    }
}
