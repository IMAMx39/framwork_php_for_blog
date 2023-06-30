<?php

namespace App\Controller\Admin;

use App\Model\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\UserService;
use Core\Controller;
use Core\Request;
use Core\Response;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AdminController extends Controller
{

    private UserRepository $userRepository;
    private UserService $userService;
    private PostRepository $postRepository;


    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->userService = new UserService();
        $this->postRepository = new PostRepository();
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function admin(): Response
    {
        $user = $this->userService->getUserFromSession();

        if ($user->getStatus() === 'visitor' ) {
            header('location: /home');
        }
        elseif ($user->getStatus() === 'admin')
        {
            header('location: /admin');
        }
        return $this->displayUsers();
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function displayUsers(): Response
    {
        $users = $this->userRepository->getAllUsers();

        $data = [
            'users' => $users,
            ];


        return $this->render('adminUsers', $data);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function adminPost(Request $request): Response
    {
        
        return $this->render('adminPosts', []);
    }

}