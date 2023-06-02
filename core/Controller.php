<?php

namespace Core;

abstract class Controller
{
//    public function renderView( $view,  $data ): Response
//    {
//        $viewPath = dirname(__DIR__) . "/templates/$view.html";
//        if (file_exists($viewPath)) {
//            extract($data);
//            ob_start();
//            require $viewPath;
//            $content = ob_get_clean();
//            return new Response($content);
//        }
//        return new Response('View not found', 404);
//    }
   public function render($view, $data) : Response
    {
        $layout = $this->layoutContent();
        $view = $this->renderViewOnly($view ,$data);
        return new Response(str_replace('{{ content }}' , $view, $layout));

    }

    protected function layoutContent()
    {
        ob_start();
        include_once(dirname(__DIR__) . "/templates/layouts/base.html");
        return ob_get_clean();
    }

    protected function renderViewOnly($view ,$data)
    {
        foreach ($data as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once(dirname(__DIR__) . "/templates/$view.html");
        return ob_get_clean();
    }

}