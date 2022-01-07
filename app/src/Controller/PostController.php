<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
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

        $this->render('Frontend/home', ['francis' => $post], 'le titre de la page');
    }

    /**
     * @Route(path="/show/{id}-{truc}", name="showOne")
     * @param int $id
     * @param string $truc
     * @return void
     */
    public function getShow(int $id, string $truc)
    {
        $this->renderJSON(['message' => $truc, 'parametre' => $id]);
    }

    /**
     * @Route(path="/write-article")
     * @return void
     */
    public function getWriteArticle()
    {
        $this->render('Frontend/write-article', [], 'Write Article');
    }

    /**
     * @Route(path="/add-new-post")
     * @return void
     */
    public function postAddNewPost()
    {
        $manager = new PostManager(PDOFactory::getInstance());
        $manager->createNewPost($_POST);
        $this->render('Frontend/write-article', [], 'Write Article');

    }
}