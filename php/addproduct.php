<?php
session_start();
require "../connection/db-connection.php";
require "../classes/database.php";
$db = new Database;

$name = htmlspecialchars($_POST['name']);
$link = htmlspecialchars($_POST['link']);

if($_FILES['image']['tmp_name']==NULL)
{
$image = file_get_contents($result['../img/image.png']);
}
else{
$image = file_get_contents($_FILES['image']['tmp_name']);
}

$db->addProduct($name, $link, $image, $_SESSION['userId']);

header("location: ../index.php?page=dashboard");