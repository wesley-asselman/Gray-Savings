<?php
session_start();
include "../classes/database.php";
$db = new database;

$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$query = $db->login($userEmail);

$_SESSION["loggedin"] = NULL;
foreach($query as $result){
    echo $result['userName'];
       if ($userEmail == $result["userEmail"] && $userPassword == password_verify($userPassword, $result["userPassword"])){
           $_SESSION["loggedin"] = "Welcome " . ucfirst($result["userName"]);
           $_SESSION["userId"] = $result['userId'];
           $_SESSION["userName"] = $result['userName'];
        }else{
        $_SESSION["loggedin"] = NULL;
    }
};

if(isset($_SESSION["loggedin"])){
    header("location: ../index.php?page=dashboard");
}else{
    header("location: ../index.php?page=login");
}
