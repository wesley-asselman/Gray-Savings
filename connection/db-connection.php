<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "GSavings";
try{
$conn = "mysql:host=$servername;dbname=$db;charset=utf8";
$PDO = new PDO($conn, $username, $password);
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>