<?php
session_start();
require_once 'classes/autoload.php';

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
?>
<script>
    function OpenClose() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>