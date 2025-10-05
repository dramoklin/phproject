<?php
$db_connect = \myfrm\App::get(\myfrm\Db::class);
$title = "Home";

$posts = db()->query('SELECT * FROM posts ORDER BY id DESC ')->findAll();

//dd($posts);
$recent_posts = db()->query('SELECT * FROM posts ORDER BY id DESC LIMIT 5')->findAll();




require_once VIEWS_PATH . '/posts/index.tpl.php';