<?php

namespace App\Exceptions;

use Exception;

class YearsTableEmptyException extends Exception
{
    protected $message = 'There must be at least one academic year';
}
