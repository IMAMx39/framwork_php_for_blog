<?php

namespace Core;


class Router
{
    public Request $request;
    private array $routes = [];

    public function get(string $path, callable $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, callable $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(Request $request): ?callable
    {
        $path = $request->getPath();
        $method = $request->method();

        return $this->routes[strtolower($method)][$path] ?? null;

    }
}
