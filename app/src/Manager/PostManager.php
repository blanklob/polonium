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

        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($result as $post) {
            $posts[] = new Post($post);
        }

        return $posts;
    }

    public function findPost($id)
    {
        $query = 'SELECT * FROM Post WHERE id=:id';
        $stmnt = $this->pdo->prepare($query);

        $stmnt->bindValue('id', $id, \PDO::PARAM_INT);
        $stmnt->execute();

        $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0];
        $post = new Post($result);

        return $post;
    }

    public function createNewPost($post)
    {
        $date = new \DateTime();
        $strDate = $date->format('Y-m-d H:i:s');

        $query = 
        'INSERT INTO Post 
        (createdAt, title, content, postThumbnail, authorId) 
        VALUES 
        (:createdAt, :title, :content, :postThumbnail, :authorId)';

        $stmnt = $this->pdo->prepare($query);

        $stmnt->bindValue('createdAt', $strDate, \PDO::PARAM_STR);
        $stmnt->bindValue('title', $post['title'], \PDO::PARAM_STR);
        $stmnt->bindValue('content', $post['content'], \PDO::PARAM_STR);
        $stmnt->bindValue('postThumbnail', $post['image'], \PDO::PARAM_STR);

        // User id to change when connexion works in app
        $stmnt->bindValue('authorId', $_COOKIE['id'], \PDO::PARAM_INT);
        
        $stmnt->execute();
    }

    public function deletePost($id)
    {
        $query = 
        'DELETE FROM Post WHERE id=:id';

        $stmnt = $this->pdo->prepare($query);
        $stmnt->bindValue('id', $id, \PDO::PARAM_INT);
        
        $stmnt->execute();
    }
}