<?php

class User{
    private $db;

    public function __construct(database $db){
        $this->db = $db;
      }

    public function addUser($name, $email, $password) {

    $stmt = $this->dbh->pdo->prepare("INSERT INTO users (userName, userEmail, userPassword) VALUES (:userName, :userEmail, :userPassword)");
    $stmt->execute(array(
    ':userName' => $name,
    ':userEmail' => $email,
    ':userPassword' => password_hash($password,  PASSWORD_DEFAULT),
    ));
    return $stmt;
    }

    public function login($userEmail) {

        $query = $this->db->selectWhere("userId, userName, userPassword, userEmail", "users", "userEmail",":userEmail");
        $query->execute([
            ':userEmail' => $userEmail,
        ]);
        return $query;
    }
}