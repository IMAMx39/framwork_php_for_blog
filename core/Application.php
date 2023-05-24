<?php

namespace Core;


class Application
{
    public Response $response;
    public Router $router;
    public Request $request;
    public static Application $app;
    public static string $ROOT_DIR;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(): void
    {
       echo $this->router->resolve();
    }

}
