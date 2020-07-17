<?php
session_start();
require_once 'classes/autoload.php';

$db = new database;
$temps = new templates;
$product = new product($db);
$user = new user($db);
$transaction = new transaction($db);

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
?>

<script>
    function OpenClose() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>