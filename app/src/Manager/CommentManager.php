<?php

namespace App\Manager;

use App\Entity\Comment;
use DateTime;

class CommentManager extends BaseManager
{
    public function createComment($post, $id)
    {
      $date = new \DateTime();
      $strDate = $date->format('Y-m-d H:i:s');

      $query = 'INSERT INTO Comments
      (comment_date, comment_content, user_id, post_id) 
      VALUES 
      (:date, :content, :user_id, :post_id)';

      $stmnt = $this->pdo->prepare($query);
      $stmnt->bindValue('date', $strDate, \PDO::PARAM_STR);
      $stmnt->bindValue('content', $post['content'], \PDO::PARAM_STR);
      $stmnt->bindValue('user_id', $_COOKIE['id'], \PDO::PARAM_INT);
      $stmnt->bindValue('post_id', $id, \PDO::PARAM_INT);

      $stmnt->execute();
    }

    public function getAllComments($id)
    {
      $query = 'SELECT *, userFirstName FROM Comments INNER JOIN User ON User.id = Comments.user_id WHERE post_id = :id';

      $stmnt = $this->pdo->prepare($query);
      $stmnt->bindValue('id', $id, \PDO::PARAM_INT);
      $stmnt->execute();

      $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
      
      $comments = [];
      foreach( $result as $comment ) {
        $comments[] = new Comment($comment);
      }
      
      return $comments;
    }
}