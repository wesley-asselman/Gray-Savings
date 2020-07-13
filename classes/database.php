<?php
class Database
{
    private $dbh;

    public function __construct()
    {

        $this->dbh = $this->connection('GSavings');

    }
    private function connection($db, $servername = "localhost", $username = "root", $password = "root")
    {
        $conn = "mysql:host=$servername;dbname=$db;charset=utf8";
        return new PDO ($conn, $username, $password);
    }

    public function select($toSelect, $table) {

        $query = $this->dbh->prepare("SELECT $toSelect FROM $table");
        $query->execute();
        return $query;

    }

    public function selectWhere($toSelect, $table, $where, $arg) {

        $query = $this->dbh->prepare("SELECT $toSelect FROM $table WHERE $where = :arg");
        $query->execute([
            ':arg' => $arg,
        ]);
        return $query;

    }

}