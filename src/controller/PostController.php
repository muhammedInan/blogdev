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

    public function addPost()
    {
        $postManager = new PostManager();
        
    }

    public function updatePost()
    {

    }

    public function deletePost()
    {

    }

    public function showPost()
    {

    }
}