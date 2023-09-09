<?php

namespace App\Exceptions;

use Exception;

class SemestersTableEmptyException extends Exception
{
    protected $message = 'You must select the current semester';
}
