<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require dirname(__DIR__) . '/config/config.php'; // подключение путей
require CORE_PATH . '/funcs.php';

require CORE_PATH . '/classes/Db.php';

$db_config = require CONFIG_PATH . '/db.php';

$db_connect = Db::getInstance()->getConnection($db_config);



require CORE_PATH . '/router.php';
//dd(ROOT);
