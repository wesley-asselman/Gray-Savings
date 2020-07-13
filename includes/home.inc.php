
<?php
$users = $db->select("*","users");

foreach($users as $user){
    echo $user['userName'] . "<br>";
}
?>