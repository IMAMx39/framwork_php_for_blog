<?php

namespace Core;

abstract class Controller
{

    protected function render(string $view, array $data): Response
    {
        $layout = $this->layoutContent();
        $view = Render::render($view, $data);
        return new Response(str_replace('{{ content }}', $view, $layout));

    }

    private function layoutContent(): string
    {
        ob_start();
        include_once(dirname(__DIR__) . "/templates/layouts/base.php");
        return ob_get_clean();
    }


}