<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;

class AccountController extends BaseController
{
    /**
     * @Route(path="/user/list", name="userlist")
     * @return void
     */
    public function getUserList()
    {
        $this->render('Frontend/user/list', [], 'Polonium - users list');
    }

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

        header('Location: http://localhost:5555/');
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

        header('Location: http://localhost:5555/');
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

        header('Location: http://localhost:5555/');
        exit;
    }
}