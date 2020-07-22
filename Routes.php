<?php

require_once 'classes/autoload.php';

if ( ! isset( $_REQUEST['action'] ) ) {
    die( 'Geen action!!!' );
}

$database = new Database();
$request = new Request( $_REQUEST );

$action = $request->get( 'action' );
$method = $_SERVER['REQUEST_METHOD'];

if ( 'products' === $action && 'GET' === $method ) {
    $product = new Product( $database );
    $product->index();
}

if ( 'products' === $action && 'POST' === $method ) {
    $product = new Product( $database );
    $product->add( $request );
}

// if ( 'dummy' === $action && 'GET' === $method ) {
//     $user = new User( $database );
//     $user->index( $request );
// }

if ( 'dummy' === $action && 'POST' === $method ) {
    $user = new User( $database );
    $user->add( $request );
}