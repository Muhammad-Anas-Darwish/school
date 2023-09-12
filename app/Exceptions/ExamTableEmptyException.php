<?php

namespace App\Exceptions;

use Exception;

class ExamTableEmptyException extends Exception
{
    protected $message = 'You must select the current exam';
}
