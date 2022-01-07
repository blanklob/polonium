<?php

namespace App\Manager;

use App\Core\Factory\PDOFactory;
use App\Entity\Post;

class PostManager extends BaseManager
{
    public function findAllPosts()
    {
        $query = 'SELECT * FROM Post';
        $stmnt = $this->pdo->query($query);

        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0];

        return new Post($result);
    }

    public function createNewPost($post)
    {
        $date = new \DateTime();
        $strDate = $date->format('Y-m-d H:i:s');

        $query = 
        'INSERT INTO Post 
        (createdAt, title, content, post_thumbnail, user_id) 
        VALUES 
        (:createdAt, :title, :content, :post_thumbnail, :user_id)';

        $stmnt = $this->pdo->prepare($query);

        $stmnt->bindValue('createdAt', $strDate, \PDO::PARAM_STR);
        $stmnt->bindValue('title', $post['title'], \PDO::PARAM_STR);
        $stmnt->bindValue('content', $post['content'], \PDO::PARAM_STR);
        $stmnt->bindValue('post_thumbnail', $post['image'], \PDO::PARAM_STR);

        // User id to change when connexion works in app
        $stmnt->bindValue('user_id', 1, \PDO::PARAM_INT);
        
        $stmnt->execute();
    }
}