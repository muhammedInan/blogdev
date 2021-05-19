<?php

namespace App\Controller;

use App\Model\Db\PostManager;

class PostController extends Controller {

    public function listPosts()
    {
        $postManager =  new PostManager();
        $posts = $postManager->getPosts();
        return $this->render('post/listPosts.html.twig', array(
            'posts' => $posts,
        ));
    }
}