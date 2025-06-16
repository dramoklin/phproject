<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $fillable = ['title', 'excerpt', 'content']; //   список полей которые должны получать (валидация)

    $data = load($fillable);

    //validation

    $error = []; //  в масив записываются ошибки валидации 

    if (empty(trim($data['title']))) {
        $error['title'] = 'Title is required';
    }
    if (empty(trim($data['excerpt']))) {
        $error['excerpt'] = 'Excerpt is required';
    }
    if (empty(trim($data['content']))) {
        $error['content'] = 'Content is required';
    }


    if (empty($error)) {
        $db_connect->query("INSERT INTO posts(`title`, `excerpt`, `content`) VALUES (?,?,?)", [$_POST['title'], $_POST['excerpt'], $_POST['content']]);
    }


}

$title = "Home:: New Post";

require_once VIEWS_PATH . '/post-create.tpl.php';