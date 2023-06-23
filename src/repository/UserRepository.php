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
        $hash = md5($password);
        $req = $this->getCnx()->prepare(
            'INSERT INTO user (firstname, lastname, email, password)
            VALUES (?, ?, ?, ?)');

        return $req->execute(array($firstname, $lastname, $email, $hash));
    }

    public function getUserLogin(string $email, string $password) : ?User
    {
        $pwdHash = md5($password);

        $query = $this->getCnx()->prepare(
            'SELECT u.password, u.email
                FROM user u
                WHERE u.email = ? AND u.password = ?');

        $query->setFetchMode(\PDO::FETCH_CLASS, User::class);

        if(!$query->execute(array($email, $pwdHash))) {
            return null;
        }

        $result = $query->fetch();
        return !$result ? null : $result;
    }
}