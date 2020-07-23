<?php
session_start();
require_once 'classes/autoload.php';

$db = new Database;
$temps = new Template;
$product = new Product($db);
$user = new User($db);
$transaction = new Transaction($db);

$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$temps->incHeader();
$temps->incNavbar();

if (file_exists('includes/' . $page . '.inc.php')) :
    include 'includes/' . $page . '.inc.php';
else :
    include "includes/404.inc.php";
endif;

$temps->incFooter();
?>

<script>
    function OpenPlan() {
      var y = document.getElementById("options");
      var x = document.getElementById("plan");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
        y.style.display = "none";
      }
    }

  function OpenOptions() {
    var y = document.getElementById("options");
    var x = document.getElementById("plan");
    if (y.style.display === "block") {
      y.style.display = "none";
    } else {
      y.style.display = "block";
      x.style.display = "none"
    }
  }
</script>