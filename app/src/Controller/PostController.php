<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\CommentManager;
use App\Manager\PostManager;

class PostController extends BaseController
{
    /**
     * @Route(path="/", name="homePage")
     * @return void
     */
    public function getHome()
    {
        $manager = new PostManager(PDOFactory::getInstance());

        $post = $manager->findAllPosts();

        $this->render('Frontend/home', ['francis' => $post], 'Polonium blog manager');
    }

    /**
     * @Route(path="/show/{id}", name="showOne")
     * @param int $id
     * @param string $truc
     * @return void
     */
    public function getShow(int $id)
    {
        $manager = new PostManager(PDOFactory::getInstance());
        $post = $manager->findPost($id);

        $commentManager = new CommentManager(PDOFactory::getInstance());
        $comments = $commentManager->getAllComments($id);

        $this->render('Frontend/post', ['post' => $post, 'comments' => $comments], 'Polonium blog manager – Posts');
    }

    /**
     * @Route(path="/delete-article/{id}")
     * @param int $id
     * @return void
     */
    public function getDeleteArticle(int $id)
    {
        if( ! isset($_COOKIE['userRole']) || $_COOKIE['userRole'] != 1) {
            header('Location: /');
            exit;
        }

        $manager = new PostManager(PDOFactory::getInstance());
        $manager->deletePost($id);

        header('Location: /');
        exit;
    }


    /**
     * @Route(path="/write-article")
     * @return void
     */
    public function getWriteArticle()
    {
        $this->render('Frontend/write-article', [], 'Polonium blog manager – Write Article');
    }


    /**
     * @Route(path="/modify-article/{id}")
     * @return void
     */
    public function getModifyArticle(int $id)
    {
        $manager = new PostManager(PDOFactory::getInstance());
        $post = $manager->findPost($id);

        $this->render('Frontend/modify-article', ['post' => $post], 'Polonium blog manager –Write Article');
    }

    /**
     * @Route(path="/modify-article/{id}")
     * @return void
     */
    public function postModifyArticle(int $id)
    {
        $manager = new PostManager(PDOFactory::getInstance());
        $post = $manager->modifyArticle($_POST, $_FILES, $id);
        header('Location: /');

        exit;
    }

    /**
     * @Route(path="/add-new-post")
     * @return void
     */
    public function postAddNewPost()
    {
        $manager = new PostManager(PDOFactory::getInstance());

        foreach ($_POST as $key => $value) {
            $post[$key] = $value;
        }

        $post['image'] = '../images/' . $_FILES['image']['name'];
        $manager->createNewPost($post);

        $uploadFileDir = './images/';
        $dest_path = $uploadFileDir . $_FILES['image']['name'];
        $fileTmpPath = $_FILES['image']['tmp_name'];
        move_uploaded_file($fileTmpPath, $dest_path);

        header('Location:/');
        exit;
    }
}