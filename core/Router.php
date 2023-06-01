<?php

namespace Core;


class Router
{
    public Request $request;
    public Response $response;
    private array $routes = [];



    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->statusCode('404');
            return $this->renderView("_404");
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback , $this->request);
    }

    public function renderView($view, $params =[]): array|bool|string
    {
        $layout = $this->layoutContent();
        $view = $this->renderViewOnly($view ,$params);
        return str_replace('{{ content }}' , $view, $layout);

    }

   public function renderContent($view): array|bool|string
   {
        $layout = $this->layoutContent();
        return str_replace('{{ content }}' , $view, $layout);

    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/src/templates/layouts/$layout.html.twig";
        return ob_get_clean();
    }

    protected function renderViewOnly($view ,$params)
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/src/templates/$view.html.twig";
//        include_once Application::$ROOT_DIR."/src/templates/$view.php";
        return ob_get_clean();
    }


}
