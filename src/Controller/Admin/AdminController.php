<?php

namespace App\Controller\Admin;

use App\Model\Post;
use App\Model\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\UserService;
use Core\Controller;
use Core\Form\Field\Email as InputEmail;
use Core\Form\Field\Input;
use Core\Form\Field\Textarea;
use Core\Form\FormBuilder;
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

    public function index():Response
    {
        return $this->render('admin',[]);
    }
    public function admin(Request $request ,?array $action): Response
    {
        $user = $this->userService->getUserFromSession();

        if ($user->getStatus() === 'visitor'  ) {
            header('location: /home');
        }

        elseif ($user->getStatus() === 'admin')
        {
            $this->render('admin',[]);
        }
        return $this->displayUsers();
    }

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
     * @throws LoaderError|\Exception
     */
    public function createPost(Request $request ): Response
    {
        $errors = [];
        $form = new FormBuilder('POST');

        $form
           ->add(
                (new Input('title', ['id' => 'title', 'class' => 'form-control']))
                    ->withLabel('Titre du Post')
                    ->required()
            )->add(
                (new Textarea('head', ['id' => 'head', 'class' => 'form-control']))
                    ->withLabel('Chapô du Post')
                    ->required()
            )->add(
                (new Textarea('content', ['id' => 'content', 'class' => ' form-control']))
                    ->withLabel('Contenu du Post'
                    )->required()
            );

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()){
            $title = $request->post('title');
            $head = $request->post('head');
            $content = $request->post('content');

            $post = (new Post())
                ->setTitle($title)
                ->setHead($head)
                ->setContent($content);
             $this->postRepository->createPost($post,
                $this->userService->getUserFromSession()->getStatus() === 'admin');
        }

        return $this->render('adminPost', [
            "form" => $form,
            'errors' => $errors
        ]);
    }

}