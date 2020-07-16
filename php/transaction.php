<?php
session_start();
include "../classes/database.php";

$db = new database;

$productId = $_POST['productId'];

if(isset($_POST['posamount'])){
    $amount = $_POST['posamount'];
}elseif(isset($_POST['negamount'])){
    $amount = "-" . $_POST['negamount'];
}else{
    $_SESSION['productId'] = $_POST['productId'];
    $_SESSION['transactionfail'] = TRUE;
    header("location: ../index.php?page=single-product");
};

$amount = str_replace(",", ".", $amount);

$db->addTransaction($amount, $productId);

$_SESSION['productId'] = $_POST['productId'];
header("location: ../index.php?page=single-product");