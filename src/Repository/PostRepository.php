<?php

namespace App\Repository;

use App\Model\Post;
use Core\Db\Manager;

class PostRepository extends Manager
{

    public function createPost(Post $post,string $username) : ?int
    {
        $query = $this->getCnxConfig()->prepare(
            'INSERT INTO post(title,head,content, createdAt, fk_user_pseudo) VALUES (?, ?, ?, now(), ?);'
        );

        return $query->execute([
            $post->getTitle(),
            $post->getHead(),
            $post->getContent(),
            $username
        ]);

//        return $result ? $this->getCnx()->lastInsertId() : null;

    }

    public function getAllPosts() : array
    {
        $req = $this->getCnxConfig()->query(
            'SELECT id, title, head, content,createdAt , updatedAt ,  pseudo author
                FROM post  INNER JOIN user on post.fk_user_pseudo = user.pseudo ORDER BY post.createdAt DESC');

        $req->execute();

        return $req->fetchAll(\PDO::FETCH_CLASS,Post::class);
    }

    public function getPostByID(int $id) : ?Post
    {
        $req = $this->getCnxConfig()->prepare(
            'SELECT id, title, head, content, createdAt , updatedAt , pseudo author FROM post, user 
                WHERE post.fk_user_pseudo = user.pseudo AND post.id = ?');

        $req->setFetchMode(\PDO::FETCH_CLASS, Post::class);
        $req->execute([($id)]);
        return $req->fetch();
    }

}