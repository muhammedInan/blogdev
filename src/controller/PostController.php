<?php

namespace App\Controller;

use Components\Session;
use App\Model\Entity\Post;
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
        $session = Session::getSession();
        $user = $this->getUser();
        $postManager = new PostManager();
        if (isset($user)) {
            if ('POST' === $_SERVER['REQUEST_METHOD'] && $this->verifyToken($_POST['token'])) {
                $post = new Post($_POST);
                $post->setUser($user);
                $postManager->addPost($post);
            }
            return $this->render('post/addpost.html.twig', array(
                'token' => $this->generateToken(),
            ));
        } else {
            return $this->render('error/403.html.twig');
        }
        
    }

    public function updatePost($postId)
    {
        $user = $this->getUser();
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);
        if ($user->getId() == $post->getUser()->getId()) {
            if ('POST' === $_SERVER['REQUEST_METHOD'] && $this->verifyToken($_POST['token'])) {
                $post = new Post([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'userId' => $user->id,
                ]);
                $postManager->updatePost($post);
            }
            return $this->render('post/updatepost.html.twig', array(
                'post' => $post,
                'token' => $this->generateToken(),
            ));
        } else {
            return $this->render('error/403.html.twig');
        }
    }

    public function deletePost($postId, $token)
    {
        $session = $this->getSession();
        if ($session->getUser() !== null)
        $postManager = new PostManager();
        {
            if(!empty($postId)) {
                if('GET' === $_SERVER['REQUEST_METHOD'] && $this->verifyToken($token)) {
                    $post = new Post([
                        'id' => $postId,
                        'user' => $session->getUser(),
                    ]);
                    $postManager->deletePost($post);
                }
                return $this->render('post/addpost.html.twig', array(
                    'user' =>$this->getUser(),
                ));
            } else
                return $this->render('404.html.twig');
        }
    }

    public function showPost()
    {

    }
}