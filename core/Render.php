<?php

namespace Core;

class Render
{
    public function renderView($view, $params =[])
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
        ob_start();
        include_once Application::$ROOT_DIR."/src/templates/layouts/main.html.twig";
        return ob_get_clean();
    }

    protected function renderViewOnly($view ,$params)
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/src/templates/$view.html.twig";
        return ob_get_clean();
    }
}