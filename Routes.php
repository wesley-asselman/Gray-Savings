<?php
session_start();
require_once 'classes/autoload.php';

if (!isset($_REQUEST['action'])) {
    die('Geen action!!!');
}

$database = new Database();
$request = new Request($_REQUEST);
$location = new Location();

$action = $request->get('action');
$method = $_SERVER['REQUEST_METHOD'];

if ('products' === $action && 'GET' === $method) {
    $product = new Product($database);
    $product->index();
}

if ('products' === $action && 'POST' === $method) {
    $product = new Product($database);
    $product->add($request);
    $location->dashBoard();
}

if ('deleteproduct' === $action && 'GET' === $method) {
    $product = new Product($database);
    $product->delete($request);
    $location->dashBoard();
}

if ('login' === $action && 'POST' === $method) {
    $user = new User($database);
    $user->login($request);
    $location->dashBoard();
}

if ('logout' === $action && 'POST' === $method) {
    session_destroy();
    $location->home();
}

if ('register' === $action && 'POST' === $method) {
    $user = new User($database);
    $user->add($request);
    $location->home();
}