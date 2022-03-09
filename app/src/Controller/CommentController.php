<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\CommentManager;

class CommentController extends BaseController
{
    /**
     * @Route(path="/add-comment/{id}", name="addComment")
     * @return void
     */
    public function postAddComment(int $id)
    {
        $manager = new CommentManager(PDOFactory::getInstance());
        $manager->createComment($_POST, $id);

        header('Location: /show/' . $id);
        exit;
    }

}