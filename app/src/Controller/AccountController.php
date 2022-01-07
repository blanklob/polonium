<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;

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
        $this->render('Frontend/user/signup', [], 'Polonium - sign un');
    }
}