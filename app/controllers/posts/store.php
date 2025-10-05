<?php
use myfrm\Validator;
use myfrm\Db;
$db_connect= \myfrm\App::get(\myfrm\Db::class);
/**
 *  @var Db $db_connect
 */



$fillable = ['title', 'excerpt', 'content']; //   список полей которые должны получать (валидация)

$data = load($fillable); // получение данных из формы 

//validation
$validator = new Validator(); // обьект класа валидации
$rules = [
    'title' => [
        'required' => 'true',
        'min' => 5,
        'max' => 109,
    ],
    'excerpt' => [
        'required' => 'true',
        'min' => 10,
        'max' => 109,
    ],
    'content' => [
        'required' => 'true',
        'min' => 5,
    ],
];

/*  $rules = [
      'title' => [
          'required' => 'true',
          'min' => 5,
          'max' => 109,
      ],
      'excerpt' => [
          'required' => 'true',
          'min' => 10,
          'max' => 109,
      ],
      'content' => [
          'required' => 'true',
          'min' => 5,
      ],
      'password' => [
          'required' => 'true',
          'min' => 5,
      ],
      'repassword' => [
          'match' => 'password',
      ],
  ]; */
$validation = $validator->validate($data, $rules); // передача правил валидации в клас и масива с полученными даными  с формы

if (!$validation->hasErrors()) { // проверка на отсутвие ошибок ,далее выполнение запроса в базу
    if ($db_connect->query("INSERT INTO posts(`title`, `excerpt`, `content`) VALUES (:title,:excerpt,:content)", $data)) { // выполнение запроса с параметрами
        $_SESSION['success'] = "Post created successfully";
    } else {
        $_SESSION['error'] = "Post creation failed";
    }

    redirect('/phproject/index');
} else {
    require VIEWS_PATH . '/posts/create.tpl.php';
}
