<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Session\Store;

class YearsTableEmptyException extends Exception
{
    protected $message = 'There must be at least one academic year';
}