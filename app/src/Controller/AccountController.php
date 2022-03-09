<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;

class AccountController extends BaseController
{
    /**
     * @Route(path="/user/signin")
     * @return void
     */
    public function getSignIn()
    {
        $this->render('Frontend/user/signin', [], 'Polonium - sign in');
    }

    /**
     * @Route(path="/user/signup")
     * @return void
     */
    public function getSignUp()
    {
        $this->render('Frontend/user/signup', [], 'Polonium - sign up');
    }
    
    /**
     * @Route(path="/user/logout")
     * @return void
     */
    public function getLogout()
    {
        $manager = new UserManager(PDOFactory::getInstance());
        $manager->logoutUser();

        header('Location: http://localhost:5555/');
        exit;
    }

    /**
     * @Route(path="/user/show-all")
     * @return void
     */
    public function getShowAll()
    {
        $manager = new UserManager(PDOFactory::getInstance());
        $users = $manager->findAllUsers();
        $this->render('Frontend/user/showall', ['users' => $users], 'Polonium - show users');
    }

    /**
     * @Route(path="/user/account")
     * @return void
     */
    public function getUserAccount()
    {
        $this->render('Frontend/user/account', ['user' => $_COOKIE], 'Polonium - user Account');
    }

    /**
     * @Route(path="/add-user")
     * @return void
     */
    public function postAddUser()
    {
        $manager = new UserManager(PDOFactory::getInstance());
        $manager->createNewUser($_POST);
        $post = $manager->getUser($_POST);
        $manager->setCookies($post);

        header('Location: /');
        exit;

    }
    
    /**
     * @Route(path="/get-user")
     * @return void
     */
    public function postGetUser()
    {
        $manager = new UserManager(PDOFactory::getInstance());
        $post = $manager->getUser($_POST);

        if (!isset($_COOKIE['userFirstName'])) {
            $manager->setCookies($post);
        }

        header('Location: /');
        exit;
    }

        
    /**
     * @Route(path="/modify-user")
     * @return void
     */
    public function postModifyUser()
    {
        $manager = new UserManager(PDOFactory::getInstance());
        $post = $manager->modifyUser($_POST, $_COOKIE);
        $manager->setCookies($post);

        header('Location: /');
        exit;
    }

            
    /**
     * @Route(path="/delete-user/{id}")
     * @return void
     */
    public function getDeleteUser($id)
    {
        if( ! isset($_COOKIE['userRole']) || $_COOKIE['userRole'] != 1) {
            header('Location: /');
            exit;
        }

        $manager = new UserManager(PDOFactory::getInstance());
        $manager->deleteUser($id);

        header('Location: /user/show-all');
        exit;
    }
}