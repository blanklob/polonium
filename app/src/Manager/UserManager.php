<?php

namespace App\Manager;

use App\Core\Factory\PDOFactory;
use App\Entity\User;


class UserManager extends BaseManager
{
  public function getUser($post)
  {
    $query = 'SELECT * FROM User WHERE userPassword=:password AND userEmail=:email';

    $stmnt = $this->pdo->prepare($query);

    $stmnt->bindValue('email', $post['email'], \PDO::PARAM_STR);
    $stmnt->bindValue('password', $post['password'], \PDO::PARAM_STR);

    $stmnt->execute();
    $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0];

    return new User($result);
  }

  public function createNewUser($post)
  {
    $query = 
    'INSERT INTO User
    (userFirstName, userLastName, userEmail, userPassword, userRole) 
    VALUES 
    (:first_name, :last_name, :email, :password, :role)';

    $stmnt = $this->pdo->prepare($query);

    $stmnt->bindValue('first_name', $post['first_name'], \PDO::PARAM_STR);
    $stmnt->bindValue('last_name', $post['last_name'], \PDO::PARAM_STR);
    $stmnt->bindValue('email', $post['email'], \PDO::PARAM_STR);
    $stmnt->bindValue('password', $post['password'], \PDO::PARAM_STR);
    $stmnt->bindValue('role', $post['role'], \PDO::PARAM_STR);

    $stmnt->execute();
  }

  public function modifyUser($post)
  {

    $query = 'SELECT id FROM User WHERE userPassword=:password AND userEmail=:email';

    $stmnt = $this->pdo->prepare($query);
    $stmnt->bindValue('email', $post['email'], \PDO::PARAM_STR);
    $stmnt->bindValue('password', $post['password'], \PDO::PARAM_STR);
    $stmnt->execute();
    $id = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0]["id"];

    $query = 
    'UPDATE User
    SET userFirstName=:first_name, userLastName=:last_name, userEmail=:email, userPassword=:password, userRole=:role
    WHERE id = :id';

    $stmnt = $this->pdo->prepare($query);

    $stmnt->bindValue('id', $id, \PDO::PARAM_STR);
    $stmnt->bindValue('first_name', $post['first_name'], \PDO::PARAM_STR);
    $stmnt->bindValue('last_name', $post['last_name'], \PDO::PARAM_STR);
    $stmnt->bindValue('email', $post['email'], \PDO::PARAM_STR);
    $stmnt->bindValue('password', $post['password'], \PDO::PARAM_STR);
    $stmnt->bindValue('role', 1, \PDO::PARAM_STR);
    $stmnt->execute();

    $query = 'SELECT * FROM User WHERE userPassword=:password AND userEmail=:email';
    $stmnt = $this->pdo->prepare($query);
    $stmnt->bindValue('email', $post['email'], \PDO::PARAM_STR);
    $stmnt->bindValue('password', $post['password'], \PDO::PARAM_STR);
    $stmnt->execute();
    $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0];

    return new User($result);
  }
}