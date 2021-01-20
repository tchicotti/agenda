<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $path = $request->getPathInfo();
        $return = ['status' => false, 'message' => $exception->getMessage()];
        $code = is_callable([$exception,'getStatusCode']) ? $exception->getStatusCode() : $exception->getCode();

        if (strrpos($path,'/api/') !== false) {
            if ($exception instanceof ValidationException) {

                $errorBag = $exception->validator->getMessageBag();

                $return['validation'] = $errorBag;
            }

            if ($exception instanceof QueryException) {
                $return['message'] = 'A error was founded in query execution. Please contact a administrator. Reason: '.$exception->getMessage();
            }

            if ($code == 404) {
                $return['message'] = "The resource excepted was not found: [{$path}] ";
            }

            return response()->json($return,($code == 404 ? $code:400));
        }

        return parent::render($request, $exception);
    }
}
