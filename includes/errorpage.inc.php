<?php
    if($_GET["error"] = "email"){ ?>
    <h1> You seem to have tried an email that is already in use.</h1>
    <h3>click <a href="index.php">here</a> to return to the homepage</h3>
<?php } ?>
<?php
    if($_GET['error']){ ?>
    <h1> Wrong password</h1>
    <h3>click <a href="index.php">here</a> to return to the homepage</h3>
<?php } ?>