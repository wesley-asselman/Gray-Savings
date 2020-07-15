<?php

require "../classes/database.php";

$db=new Database;
$productId = $_POST['productId'];

$db->delete("products", "productId" ,$productId );

header("location: ../index.php?page=dashboard");