<?php
namespace App\Model;

class DBConnect
{
    public $dsn;
    public $username;
    public $password;
    public function __construct()
    {
        $this->dsn="mysql:host=localhost;dbname=thithuchanh;charset=utf8";
        $this->username="root";
        $this->password="root";
    }

    public function connect()
    {
        try {
            return new \PDO($this->dsn,$this->username,$this->password);
        }
        catch (\PDOException $e){
            exit($e->getMessage());
        }
    }
}
