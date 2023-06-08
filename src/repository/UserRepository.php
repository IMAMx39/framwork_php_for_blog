<?php

namespace App\repository;

use App\Model\User;
use Core\Db\BaseManager;

class UserRepository extends BaseManager
{
    public function getAllUser( ) : ?User
    {

        $query = $this->getCnx()->prepare(
            'SELECT firstname,lastname,email,password FROM user'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $query->execute();
        $rst = $query->fetch();
        return !$rst ? null : $rst;    }
}