<?php

require_once CORE_PATH . '/classes/Validator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {





    $fillable = [ 'title', 'excerpt', 'content' ]; //   список полей которые должны получать (валидация)

    $data = load( $fillable ); // получение данных из формы 

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
        ]
    ];
    $validation = $validator->validate( $data, $rules ); // передача правил валидации в клас и масива с полученными даными  с формы

    if ($validation->hasErrors()) {
        print_arr( $validation->getErrors() );
    } else {
        echo "SUCCESS";
    }




    // if (empty( ( $data['title'] ) )) {
    //     $error['title'] = 'Title is required';
    // }
    // if (empty( ( $data['excerpt'] ) )) {
    //     $error['excerpt'] = 'Excerpt is required';
    // }
    // if (empty( ( $data['content'] ) )) {
    //     $error['content'] = 'Content is required';
    // }


    if (empty( $error )) { // если ошибки в запросе нет , то выполняется запрос на создание поста
        if ($db_connect->query( "INSERT INTO posts(`title`, `excerpt`, `content`) VALUES (:title,:excerpt,:content)", $data )) { // выполнение запроса с параметрами
            echo "Post created successfully";
        } else {
            echo "Post creation failed";
        }
        // redirect('/phproject/posts/create');
    }


}

$title = "Home:: New Post";

require_once VIEWS_PATH . '/post-create.tpl.php';