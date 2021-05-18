<?php

namespace App\Model\Db;

class PostManager extends Database
{
    public function getPosts()
    {
        $db = $this->getConnection();
        $req = $db->query('SELECT post.id, title, content, creation_date');
    }
}