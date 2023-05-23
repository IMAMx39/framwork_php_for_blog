<?php

namespace Imaas\MyBlog\controller;

use Imaas\MyBlog\templates\TwigRenderer;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

abstract class ControllerBase
{

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    protected function render(string $template, array $data) : string
    {
//        $data['session_username'] = Session::GetUsername();
//        $data['session_isAdmin'] = Session::IsUserAdmin();
        return TwigRenderer::getRender()->render($template, $data);
    }

}
