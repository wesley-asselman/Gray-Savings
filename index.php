<?php
session_start();
require_once 'classes/database.php';
require_once 'classes/templates.php';

$db = new Database;
$temps = new templates;

$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$temps->inc_Header();
$temps->inc_Navbar();

if (file_exists('includes/' . $page . '.inc.php')) :
    include 'includes/' . $page . '.inc.php';
else :
    include "includes/404.inc.php";
endif;

$temps->inc_Footer();

