<?php

namespace App\Controller;

use App\Repository\CommentRepository;
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
    private CommentRepository $commentRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->commentRepository = new CommentRepository();
    }


    public function index(Request $request, array $args): Response
    {
        $post = $this->postRepository->getPostByID($args[0]);
        $comments = $this->commentRepository->getCommentsOfPostById($args[0]);
        if (!$post) {
            throw new RuntimeException("Ce post n'existe pas.");
        }
        $data = [
            "post" => $post,
            "comments" => $comments,
            "postId" => $args[0]
        ];

        return $this->render('post', $data);

    }

}
