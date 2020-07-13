<?php
require_once 'classes/database.php';
$db = new Database;

$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
require 'templates/header.php';
require "templates/navbar.php";
if (file_exists('includes/' . $page . '.inc.php')) :
    include 'includes/' . $page . '.inc.php';
else :
    include "includes/404.inc.php";
endif;
