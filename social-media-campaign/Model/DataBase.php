<?php

namespace Model;

use PDO;
use PDOException;

class DataBase
{
    protected static $instance;
    public $pdo;
    public function __construct()
    {
        try {
            $this->pdo=new PDO("mysql:dbname=socail_media_campaign;host=localhost","root","");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public static function getInstance() : DataBase
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}