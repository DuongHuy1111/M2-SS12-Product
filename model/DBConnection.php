<?php
namespace model;
use PDO;
use Exception;
class DBConnection
{
    public $conn;
    public $dns;
    public $username;
    public $password;

    public function __construct($dns, $username, $password)
    {
        $this->dns = $dns;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO($this->dns, $this->username, $this->password);
            return $this->conn;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        return null;
    }
}