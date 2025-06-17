<?php

function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data)
{
    dump($data);
    die;
}

function abort($code = 404)
{
    http_response_code($code);
    require VIEWS_PATH . "/errors/{$code}.tpl.php";
    die;
}

function load($fillable = [])
{
    $data = [];// пустой масив , будет результат перебора  получаемого масива

    foreach ($_POST as $key => $value) {  // перебор получаемого масива POST
        if (in_array($key, $fillable)) { // поиск совпадений  ключей в POST  с ключами fillable 
            $data[$key] = $value; // запись значение с масива POST по ключю в масив дата
        }
    }
    return $data;
}

/* функция load для сравнения ключей масива с ключами fillable  и получения значений с форми для валидации получаемих полей на севере(получить лишь нужные поля)*/
