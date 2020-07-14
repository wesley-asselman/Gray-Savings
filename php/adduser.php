<?php
require "../connection/db-connection.php";
require "../classes/database.php";
$db = new Database;

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

// $db->addUser($name,$email,$password);

$db->addUser($name, $email, $password);

header("location: ../index.php?page=home");