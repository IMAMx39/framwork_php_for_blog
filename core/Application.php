<?php

namespace Core;

use LogicException;

class Application
{
    private Router $router;

    public function __construct()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $this->router = new Router();
    }

    public function request(Request $request): Response
    {
        [$callable, $params] = $this->router->resolve($request);
        //if (!is_callable($callable)) {
        //    return new Response('', 404);
        //}

        $response = call_user_func_array($callable, [$request,$params]);
        if (!$response instanceof Response) {
            throw new LogicException('Controller response must be an instance of ' . Response::class . ' ' . gettype($response) . ' given');
        }

        return $response;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }
}
