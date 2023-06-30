<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Core\Controller;
use Core\Request;
use Core\Response;
use RuntimeException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PostController extends Controller
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
    public function index(Request $request, array $args): Response
    {
        $post = $this->postRepository->getPostByID($args[0]);
        if(!$post) {
            throw new RuntimeException("Ce post n'existe pas.");
        }
        $data = [
          'post' => $post
        ];

        return $this->render('post', $data);

    }

}