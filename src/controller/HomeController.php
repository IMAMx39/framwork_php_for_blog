<?php

namespace Imaas\MyBlog\controller;

class HomeController extends ControllerBase
{
    public function __invoke() : string
    {
        $data = ['title' => 'Amazing Blog !'];
        return $this->render('home.twig', $data);

    }

}
