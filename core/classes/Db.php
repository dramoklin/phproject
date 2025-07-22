<?php

use PhpParser\Node\Stmt\TryCatch;

class Db // класс для работы с базой данных
{
    private $connection; // для хранения соединения с базой данных

    private $stmt; // для хранения подготовленного запроса

    private static $instance = null; // для хранения экземпляра класса

    private function __construct()
    {

    }
    private function __clone()
    {

    }
    public function __wakeup()
    {

    }

    public static function getInstance() // метод для получения экземпляра класса
    {
        if (self::$instance === null) { // проверка на существование экземпляра класса по принципу синглтона (для избежания создания нескольких экземпляров класса по одному и тому же соединению с базой данных для экономии ресурсов)
            self::$instance = new self(); // создание экземпляра класса
        }
        return self::$instance; // возвращает экземпляр класса
    }

    public function getConnection(array $db_config) // метод для получения соединения с базой данных
    {
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
        try {
            $this->connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) { // обработка ошибки соединения с базой данных
            //throw new Exception("Database connection failed: " . $e->getMessage());
            abort(500); // вывод ошибки соединения с базой данных с пом
        }
    }

    public function query($query, $params = []) // метод для выполнения запроса
    {

        try { // обработка ошибки выполнения запроса
            $this->stmt = $this->connection->prepare( $query ); //создание подготовленного запроса
            $this->stmt->execute( $params );// выполнение запроса   
        } catch (PDOException $e) { 
            return false;
        }
        
        return $this; // возвращает экземпляр класса

    }

    public function findAll() // метод для получения всех строк
    {
        return $this->stmt->fetchAll();

    }
    public function find() // отримання першої строки , для окремого контролера з відображення одного поста
    {
        return $this->stmt->fetch();
    }

    public function findOrFail() // при не отриманні id поста  ,відображати помилку
    {
        $res = $this->find();
        if (!$res) {
            abort(500);
        }
        return $res;
    }

}