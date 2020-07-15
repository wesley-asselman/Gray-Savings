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
        return new PDO ($conn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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

    public function login($userEmail) {

        $query = $this->dbh->prepare("SELECT userId, userName, userPassword, userEmail FROM users WHERE userEmail = :userEmail");
        $query->execute([
            ':userEmail' => $userEmail,
        ]);
        return $query;
    }

    public function insert($table, $toInsert, $placeholders, $variables)
    {
        $query_items = implode(",", $toInsert);
        $query_placeholders = implode(",", $placeholders);
        $test = $query_vars = implode(",", $variables);

        var_dump($test); die();

        $stmt = $this->dbh->prepare("INSERT INTO $table ( $query_items ) VALUES ( $query_placeholders) ");
        $stmt->execute(array(
            $query_placeholders => $query_vars,
            ));


        return $stmt;
    }

    public function addUser($name, $email, $password) {

        $stmt = $this->dbh->prepare("INSERT INTO users (userName, userEmail, userPassword) VALUES (:userName, :userEmail, :userPassword)");
        $stmt->execute(array(
        ':userName' => $name,
        ':userEmail' => $email,
        ':userPassword' => password_hash($password,  PASSWORD_DEFAULT),
        ));
        return $stmt;

    }

    public function addProduct($name, $link, $image, $userId) {
        $stmt = $this->dbh->prepare("INSERT INTO products (productName, productImg, productLink, userId) VALUES (:productName, :productImg, :productLink, :userId)");
        $stmt->execute(array(
        ':productName' => $name,
        ':productLink' => $link,
        ':productImg' => $image,
        ':userId' => $userId,
        ));
        return $stmt;
    }

    public function delete($table, $tableId, $Id){
        $stmt = $this->dbh->prepare("DELETE FROM $table WHERE $tableId = :arg");
        $stmt->execute(array(
        ':arg' => $Id,
        ));
        return $stmt;
    }
}