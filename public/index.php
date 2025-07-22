<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require dirname(__DIR__) . '/config/config.php'; // подключение путей 
require CORE_PATH . '/funcs.php'; // подключение функций 

require CORE_PATH . '/classes/Db.php'; // подключение класса Db 

$db_config = require CONFIG_PATH . '/db.php'; // получение конфигурации для соединения с базой данных

$db_connect = Db::getInstance()->getConnection($db_config); // создание экземпляра класса Db через метод getInstance (синглтон) и получение соединения с базой данных для работы с базой данных



require CORE_PATH . '/router.php'; 
//dd(ROOT);
