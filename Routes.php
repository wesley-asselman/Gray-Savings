<?php
session_start();
require_once 'classes/autoload.php';

if (!isset($_REQUEST['action'])) {
    die('Geen action!!!');
}

$database = new Database();
$request = new Request($_REQUEST);

$location = new Location();
$dashboard = $location->headerLoc('dashboard');
$home = $location->headerLoc('home');

$action = $request->get('action');
$method = $_SERVER['REQUEST_METHOD'];

if ('products' === $action && 'GET' === $method) {
    $product = new Product($database);
    $product->index();
}

if ('products' === $action && 'POST' === $method) {
    $product = new Product($database);
    $product->add($request);
    $dashboard;
}

if ('deleteproduct' === $action && 'GET' === $method) {
    $product = new Product($database);
    $product->delete($request);
    $dashboard;
}

if ('login' === $action && 'POST' === $method) {
    $user = new User($database);
    $user->add($request);
}

if ('logout' === $action && 'POST' === $method) {
    session_destroy();
    $home;
}