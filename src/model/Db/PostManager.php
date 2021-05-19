<?php

namespace App\Model\Db;

use App\Model\Entity\User;
use App\Model\Entity\Post;

class PostManager extends Database
{
    public function getPosts()
    {
        $db = $this->getConnection();
        $req = $db->query('SELECT post.id, title, content, creation_date,
                                        user_id, username, email, role
                                        FROM post INNER JOIN `user` ON user_id = `user`.id ORDER BY creation_date');
        $posts = array();
        while($post = $req->fetch()) {
            $postline = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'creationDate' => new \DateTime($post->creation_date),
            ];
            $userline = [
                'id' => $post->user_id,
                'username' => $post->username,
                'email' => $post->email,
                'role' => $post->role,
            ];
            $user = new User($userline);
            $poster = new Post($postline);
            $poster->setUser($user);
            $posts[] = $poster;
        }
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->getConnection();
        $req = $db->query('SELECT post.id, title, content, creation_date, user_id FROM post INNER JOIN ̀`user` ON user_id = `user`.id WHERE post.id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        $postline = [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'creationDate' =>new \DateTime($post->creation_date),
        ];
        $userline = [
            'id' => $post->user_id,
        ];
        $user = new User($userline);
        $poster = new Post ($postline);
        $poster->setUser($user);
        return $poster;
    }

}