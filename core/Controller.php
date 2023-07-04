<?php

namespace Core;

use App\Service\UserService;

abstract class Controller
{
    private UserService $userService;


    public function __construct()
    {
        $this->userService = new UserService();
    }

    protected function render(string $view, array $data): Response
    {
        $layout = $this->layoutContent();
        $view = Render::render($view, $data);
        return new Response(str_replace('{{ content }}', $view, $layout));

    }

    private function layoutContent(): string
    {
        ob_start();
        $user =(new UserService())->getUserFromSession();
        include_once(dirname(__DIR__) . "/templates/layouts/base.php");
        return ob_get_clean();
    }


}