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

  public function modifyUser($post, $user)
  {
    $query = 
    'UPDATE User
    SET userFirstName=:first_name, userLastName=:last_name, userEmail=:email
    WHERE id = :id';

    $stmnt = $this->pdo->prepare($query);

    $stmnt->bindValue('id', $user['id'], \PDO::PARAM_INT);
    $stmnt->bindValue('first_name', $post['first_name'], \PDO::PARAM_STR);
    $stmnt->bindValue('last_name', $post['last_name'], \PDO::PARAM_STR);
    $stmnt->bindValue('email', $post['email'], \PDO::PARAM_STR);
    $stmnt->execute();

    $query = 'SELECT * FROM User WHERE id=:id';
    $stmnt = $this->pdo->prepare($query);
    $stmnt->bindValue('id', $user['id'], \PDO::PARAM_INT);
    $stmnt->execute();
    $getUser = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0];

    $query = 'SELECT * FROM User WHERE userPassword=:password AND userEmail=:email';
    $stmnt = $this->pdo->prepare($query);
    $stmnt->bindValue('email', $getUser['userEmail'], \PDO::PARAM_STR);
    $stmnt->bindValue('password', $getUser['userPassword'], \PDO::PARAM_STR);
    $stmnt->execute();
    $result = $stmnt->fetchAll(\PDO::FETCH_ASSOC)[0];

    return new User($result);
  }

  public function setCookies($user) {
    setcookie('id', $user->getId(), time() + (3600 * 2), '/');
    setcookie('userFirstName', $user->getUserFirstName(), time() + (3600 * 2), '/');
    setcookie('userLastName', $user->getUserLastName(), time() + (3600 * 2), '/');
    setcookie('userEmail', $user->getUserEmail(), time() + (3600 * 2), '/');
    setcookie('userRole', $user->getUserRole(), time() + (3600 * 2), '/');
  }

  public function logoutUser() {
    setcookie('userFirstName', "", time() - 3600, '/');
    setcookie('userLastName', "", time() - 3600, '/');
    setcookie('userEmail', "", time() - 3600, '/');
    setcookie('userRole', "", time() - 3600, '/');
    setcookie('id', "", time() - 3600, '/');
  }
}