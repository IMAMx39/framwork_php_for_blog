<?php

namespace App\Repository;

use App\Model\User;
use App\SessionBlog;
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

    public function register(User $user, string $hashedPassword): bool
    {
        $status = 'visitor';
        $req = $this->getCnx()->prepare(
            'INSERT INTO user (pseudo,email, password, fk_user_status, firstname, lastname)
            VALUES (?, ?, ?, ?, ?, ?)');

        return $req->execute([
            $user->getPseudo(),
            $user->getEmail(),
            $hashedPassword,
            $status,
            $user->getFirstname(),
            $user->getLastname()
        ]);
    }

    public function getUser(string $email): ?User
    {

        $query = $this->getCnx()->prepare(
            'SELECT password, email, pseudo, firstname, lastname
                FROM user 
                WHERE email = ?');

        $query->setFetchMode(PDO::FETCH_CLASS, User::class);

        if (!$query->execute([($email)])) {
            return null;
        }

        $result = $query->fetch();
        return !$result ? null : $result;
    }

}