<?php
$title = "Home";

$posts = $db_connect->query('SELECT * FROM posts ORDER BY id DESC ')->findAll();

//dd($posts);
$recent_posts = $db_connect->query('SELECT * FROM posts ORDER BY id DESC LIMIT 5')->findAll();




require_once VIEWS_PATH . '/index.tpl.php';