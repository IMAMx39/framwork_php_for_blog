<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Core\Controller;
use Core\Response;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PostsListController extends Controller
{

    private PostRepository $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function index(): Response
    {
        $posts = $this->postRepository->getAllPosts();
        $data = [
            'posts' => $posts
        ];
        return $this->render('postList', $data);

    }
}