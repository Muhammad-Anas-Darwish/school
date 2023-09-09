<?php

namespace App\Exceptions;

use Exception;

class YearsTableEmptyException extends Exception
{
    protected $message = 'You must select the current academic year';
}
