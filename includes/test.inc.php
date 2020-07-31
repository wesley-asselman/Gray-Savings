<form action="Routes.php" method="POST">
    <input type="hidden" name="action" value="imgtry">
    <input type="hidden" name="name" value="<?php echo "Wesley" ?>">
    <input type="text" name="img">
    <input type="submit">
</form>

<?php echo file_put_contents("img/test.txt","hello World"); ?>
<img src="<?php echo file_get_contents("img/Wesley.txt") ?>" width="200px">