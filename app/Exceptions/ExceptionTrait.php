<?php
/**
 * Created by PhpStorm.
 * User: Bishnu pokhrel
 * Date: 1/15/2019
 * Time: 12:10 PM
 */

namespace App\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request,$e)
    {
        if ($this->isModel($e)) {
           return $this->modelResponse();

        }
        if ($this->isHttp($e)) {
           return $this->httpResponse();
        }

        return parent::render($request, $e);

    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    Protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException ;

    }

    protected function modelResponse()
    {
        return response()->json([
            'errors'=>'Product model not found'
        ],Response::HTTP_NOT_FOUND);
    }

    protected function httpResponse()
    {
        return response()->json([
            'errors'=>'Incorrect Route'
        ],Response::HTTP_NOT_FOUND);

    }

}