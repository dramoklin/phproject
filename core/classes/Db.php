<?php


class Db
{
    private $connection;

    private $stmt;

    private static $instance = null;

    private function __construct()
    {

    }
    private function __clone()
    {

    }
    public function __wakeup()
    {

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
        try {
            $this->connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) {
            //throw new Exception("Database connection failed: " . $e->getMessage());
            abort(500);
        }
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;

    }

    public function findAll() // отримання всіх строк
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