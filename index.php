<?php
require_once 'connection/db-connection.php';
require "templates/navbar.php";
$page="home";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
require 'templates/header.php';

if(file_exists('includes/' . $page . '.inc.php')) :
    include 'includes/'. $page . '.inc.php';
else :
    include "includes/404.inc.php";
endif;
