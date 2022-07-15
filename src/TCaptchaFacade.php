<?php

namespace Happyphper\TCaptcha;

use Illuminate\Support\Facades\Facade;

class TCaptchaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TCaptcha::class;
    }
}
