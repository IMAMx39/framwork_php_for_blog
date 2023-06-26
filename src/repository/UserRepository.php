<?php

namespace App\repository;

use App\Model\User;
use App\SessionBlog;
use Core\Db\BaseManager;
use Core\Session;
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

    public function registerUser(string $pseudo, string $firstname, string $lastname, string $email, string $password): string
    {
        $pswHash = md5($password);
        $status = 'visitor';
        $req = $this->getCnx()->prepare(
            'INSERT INTO user (pseudo,email, password, fk_user_status, firstname, lastname)
            VALUES (?, ?, ?, ?, ?, ?)');

        return $req->execute(array($pseudo,$email, $pswHash, $status, $firstname, $lastname));
    }

    public function getUserLogin(string $email, string $password) : ?User
    {
        $pwdHash = md5($password);

        $query = $this->getCnx()->prepare(
            'SELECT password, email, pseudo, firstname, lastname
                FROM user 
                WHERE email = ? AND password = ?');

        $query->setFetchMode(\PDO::FETCH_CLASS, User::class);

        if(!$query->execute(array($email, $pwdHash))) {
            return null;
        }

        $result = $query->fetch();
        return !$result ? null : $result;
    }
    
    public static function userIsConnected(): bool
    {
        if (!empty((new SessionBlog())->get('username'))) {
            return true;
        }
        return false;
    }

//    public static function userIsConnected(): bool
//    {
//        if (!empty((new Session())->get('username'))) {
//            return true;
//        }
//        return false;
//    }
}