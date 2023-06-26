<?php

namespace Core;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
//    public function render(string $template, array $data)
//    {
//        return Twig::getInstance()->render($template, $data);
//
//    }

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