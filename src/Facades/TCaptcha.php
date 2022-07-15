<?php

namespace Happyphper\TCaptcha\Facades;

use Illuminate\Support\Facades\Facade;

class TCaptcha extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tcaptcha';
    }
}