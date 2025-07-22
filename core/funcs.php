<?php

function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function print_arr($data)
{
    echo "<pre>";
    print_r( $data );
    echo "</pre>";
}

function dd($data)
{
    dump($data);
    die;
}

function abort($code = 404)
{
    http_response_code($code); //получение кода ответа из параметра функции и установка кода ответа в зависимости от кода ошибки
    require VIEWS_PATH . "/errors/{$code}.tpl.php"; // подключение файла с ошибкой
    die;
}

function load($fillable = [])
{
    $data = [];// пустой масив , будет результат перебора  получаемого масива

    foreach ($_POST as $key => $value) {  // перебор получаемого масива POST
        if (in_array($key, $fillable)) { // поиск совпадений  ключей в POST  с ключами fillable 
            $data[$key] = trim($value); // запись значение с масива POST по ключю в масив дата и обрезать пробелы
        }
    }
    return $data;
}

/* функция load для сравнения ключей масива с ключами fillable  и получения значений с форми для валидации получаемих полей на севере(получить лишь нужные поля)*/


function old($fieldname)  {
    return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}
// функция old(существут в lavarel) берет название поля и проверяет сущестования даного поля в получаемом масиве в случае отсутствия значения возвращается пустое поле


function h($str)  {
    return htmlspecialchars($str ,ENT_QUOTES); // ENT_QUOTES | Преобразовывает как двойные, так и одинарные кавычки,  нужен например когда в поле value используют одинарные кавычки
}
/*функция h , возвращает строку отформатированой htmlspecialchars ,что позволяет безопасно виводить пости з тегами и т.д в браузер , єкранировать кавычки в передаваемых данных с полей  (удалять теги при передачи в базу неправильно,поэтому нужно оформить вывод )*/

function redirect($url = "") { // функция для перенаправления на страницу после заполнения формы на сайте
    if ($url) {
        $redirect = $url; // если передан url, то перенаправляем на него
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PUBLIC_PATH; // если не передан url, то перенаправляем на главную страницу
    }
    header("Location: {$redirect}"); // перенаправление на страницу с помощью заголовка Location
    exit;  // выход из скрипта ,обязательно для перенаправления
}