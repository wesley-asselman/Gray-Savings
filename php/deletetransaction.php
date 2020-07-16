<?php

require "../classes/database.php";

$db=new Database;
$transactionId = $_POST['transactionId'];

$db->delete("transactions", "transactionId" ,$transactionId );

$_SESSION['productId'];
header("location: ../index.php?page=single-product");