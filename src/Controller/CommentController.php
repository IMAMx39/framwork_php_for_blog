<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Service\UserService;
use Core\Controller;
use Core\Form\Field\Input;
use Core\Form\Field\Password;
use Core\Form\FormBuilder;
use Core\Request;
use Core\Response;
use RuntimeException;

class CommentController extends Controller
{

    private CommentRepository $commentRepository;
    private UserService $userService;


    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
        $this->userService = new UserService();
    }

    function index(Request $request,array $action):Response
    {
        $request = new Request();
        $postId = $request->post('postId', true);

        switch($action[0])
        {
            case 'add':
                $comment =  $request->post('commentContent');
                $this->add($comment, $postId);
                break;

            case 'delete':
                $commentId =  $request->post('commentId', true);
                $this->delete($commentId);
                break;

            case 'approve':
                $commentId =  $request->post('commentId', true);
                $this->approve($commentId);
                break;


        }
        header('location: /articles/' . $postId);
        exit();
    }

    private function add(string $comment, int $postId) : void
    {
        $user = $this->userService->getUserFromSession();

        $username =$user?->getPseudo();
        $isAdmin = $user?->getStatus() ==='admin';

        $rslt = $this->commentRepository->addOnPostID($postId, $comment, $username, $isAdmin);

        if(!$rslt) {
            throw new RuntimeException('Un problème est survenu..');
        }

    }

    private function approve(int $commentId) : void
    {
        $user = $this->userService->getUserFromSession();

        if(!$user->getStatus() == 'Admin') {
            throw new RuntimeException();
        }

        $rslt = $this->commentRepository->approveById($commentId);

        if($rslt === false) {
            throw new RuntimeException('Un problème est survenu.');
        }
    }

    private function delete(int $commentId) : void
    {
        $user = $this->userService->getUserFromSession();

        if(!!$user->getStatus() == 'Admin') {
            throw new RuntimeException();
        }

        $rslt = $this->commentRepository->deleteById($commentId);

        if(!$rslt) {
            throw new RuntimeException('Un problème est survenu.');
        }
    }

}
