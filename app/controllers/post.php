<?php


$id = (int)$_GET['id'] ?? 0 ;


    $post = $db_connect->query("SELECT * FROM posts WHERE id = ? LIMIT 1 ",[$id]) ->findOrFail();

    $title = "Home::{$post['title']}";

require_once VIEWS_PATH . '/post.tpl.php';