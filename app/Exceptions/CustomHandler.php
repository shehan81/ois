<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use App\Exceptions\DuplicateException;

class CustomHandler extends ExceptionHandler {
    
    const DUPLICATE_ERROR = 23000;

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception) {

        //catching the QueryException and throwing back
//        if ($exception instanceof QueryException) {
//          
//        }
        
        return parent::render($request, $exception);
    }
    
    public function __toString() {
        return 'Invalid';
    }

}
