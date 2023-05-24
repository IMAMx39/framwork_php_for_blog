<?php

namespace Core;


class Router
{
    public Request $request;
    public Response $response;
    private array $routes = [
        '/' => HomeController::class,
        '/postsList' => PostsListController::class,
        '/post/([0-9]+)' => PostController::class,
        '/comment/([a-z]+)' => CommentController::class,
        '/login' => LoginController::class,
        '/logout' => LogoutController::class,
        '/signup' => SignupController::class,
        '/signup/([a-f0-9]{64})' => SignupController::class,
        '/admin' => AdminController::class,
        '/admin/([a-z]+)' => AdminController::class,
        '/contact' => ContactController::class
    ];


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
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->statusCode('404');
            return $this->renderView("_404");
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)){
            $callback[0]  = new $callback[0];
        }

        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layout = $this->layoutContent();
        $view = $this->renderViewOnly($view);
        return str_replace('{{ content }}' , $view, $layout);

    }

   public function renderContent($view)
    {
        $layout = $this->layoutContent();
        return str_replace('{{ content }}' , $view, $layout);

    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/src/templates/layouts/main.html.twig";
        return ob_get_clean();
    }

    protected function renderViewOnly($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/src/templates/$view.html.twig";
        return ob_get_clean();
    }


}
