<?php

namespace App;

use App\Model\User;
use Core\Session;

class SessionBlog extends Session
{
    public function __construct(?User $user = null)
    {
        if (!empty($user)){

            $this->set('pseudo',$user->getPseudo());
            $this->set('email',$user->getEmail());
        }

    }

}