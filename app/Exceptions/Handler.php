<?php

namespace Kerung\Exceptions;

use Exception;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use ReflectionException; 

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
       // this line allows you to redirect to a route or even back to the current page if there is a CSRF Token Mismatch
        if($e instanceof TokenMismatchException){
            return redirect()->route('index');
        }   

        if ($e instanceof ReflectionException) {
            // return \Response::view('errors.404',array(),404);
         }
    
 
        // let's add some support if a Model is not found 
        // for example, if you were to run a query for User #10000 and that user didn't exist we can return a 404 error
        if ($e instanceof ModelNotFoundException) {
            return response()->view('errors.404', [], 404);
        }  
 
        // Let's return a default error page instead of the ugly Laravel error page when we have fatal exceptions
        // if($e instanceof \Symfony\Component\Debug\Exception\FatalErrorException) {
        //     return \Response::view('errors.500',array(),500);
        // }
       
        // finally we are back to the original default error handling provided by Laravel
        if($this->isHttpException($e))
        {
            switch ($e->getStatusCode()) {
                // not found
                case 404:
                    // return \Response::view('errors.404',array(),404);
                break;
                // internal error
                // case 500:
                //     return \Response::view('errors.500',array(),500);   
                break;
 
                default:
                    return $this->renderHttpException($e);
                break;
            }
        }
        else
        {
            return parent::render($request, $e);
        } 
    }      
}
