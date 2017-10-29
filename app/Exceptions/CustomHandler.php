<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;

class CustomHandler extends ExceptionHandler {

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception) {

        dd(redirect());
        if ($exception instanceof QueryException) {
            //dd($exception->errorInfo);
             return redirect()->back()->with('errors', array('test'));
            //dd($error = $exception->errorInfo);
           // return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }
    
    public function __toString() {
        return 'Invalid';
    }

}
