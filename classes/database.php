<?php
class Database
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = $this->connection('GSavings');
    }

    private function connection($dbh, $servername = "localhost", $username = "root", $password = "root")
    {
        $conn = "mysql:host=$servername;dbname=$dbh;charset=utf8";
        return new PDO ($conn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

}