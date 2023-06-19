<?php

namespace App\repository;

use App\Model\User;
use Core\Db\BaseManager;
use PDO;

class UserRepository extends BaseManager
{
    public function getAllUsers(): ?User
    {

        $query = $this->getCnx()->prepare(
            'SELECT firstname,lastname,email,password FROM user'
        );
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $query->execute();
        $rst = $query->fetch();
        return !$rst ? null : $rst;
    }

    public function registerUser(string $firstname, string $lastname, string $email, string $password): string
    {
        $req = $this->getCnx()->prepare(
            'INSERT INTO user (firstname, lastname, email, password)
            VALUES (?, ?, ?, ?)');


        return $req->execute(array($firstname, $lastname, $email, $password));
    }
}