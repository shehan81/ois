<?php

namespace App\Exceptions;
//use Illuminate\Database\QueryException;

class DuplicateException extends \Exception {

    protected $message;

    public function __construct($message, $code = 0, Exception $previous = null) {

        $this->message = $message;

        parent::__construct($message, $code, $previous);
    }
    

}
