<?php

require_once 'classes/autoload.php';

if(isset($_COOKIE['appstate'])){
    $data = unserialize($_COOKIE['appstate'], ["allowed_classes" => false]);
  }

if (!isset($_REQUEST['action'])) {
    die('Geen action!!!');
}

$database = new Database();
$request = new Request($_REQUEST);

$action = $request->get('action');
$method = $_SERVER['REQUEST_METHOD'];

if ('products' === $action && 'GET' === $method) {
    $product = new Product($database);
    $product->index();
}

if ('products' === $action && 'POST' === $method) {
    $product = new Product($database);
    $product->add($request);
    ( new URL('dashboard'))->redirect();
}

if ('deleteproduct' === $action && 'GET' === $method) {
    $product = new Product($database);
    $product->delete($request);
    ( new URL('dashboard'))->redirect();
}

if ('login' === $action && 'POST' === $method) {
    $user = new User($database);
    $user->loginCookie($request);
    // ( new URL('dashboard'))->redirect();
}

if ('logout' === $action && 'POST' === $method) {
    setcookie("appstate", "", time() - (86400), "/");
    ( new URL('home'))->redirect();
}

if ('register' === $action && 'POST' === $method) {
    $user = new User($database);
    $user->add($request);
    ( new URL('home'))->redirect();
}

if('transaction'=== $action && 'GET' === $method) {
    $transaction = new Transaction($database);
    $transaction->add($request);
    ( new URL('single-product', ['productId' => $_GET['productId']]))->redirect();
}

if('deletetransaction'=== $action && 'GET' === $method) {
    $transaction = new Transaction($database);
    $transaction->delete($request);
    ( new URL('single-product', ['productId' => $_GET['productId']]))->redirect();
}

if('editname'=== $action && 'POST' === $method) {
    $user = new User($database);
    $user->editname($request);
    ( new URL('dashboard'))->redirect();
}