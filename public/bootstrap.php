<?php

use myfrm\ServiceContainer;

$container = new ServiceContainer();

$container->setService(\myfrm\Db::class, function (){
    $db_config = require CONFIG_PATH . '/db.php'; // получение конфигурации для соединения с базой данных

    return (\myfrm\Db::getInstance()->getConnection( $db_config )); // создание экземпляра класса Db через метод getInstance (синглтон) и получение соединения с базой данных для работы с базой данных
});


\myfrm\App::setContainer($container); // передача контейнера