<?php

namespace Core;

class Controller
{
    public string $layout = 'main';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = []): bool|array|string
    {
        return Application::$app->router->renderView($view, $params);
    }

}