<h3>User Options</h3>
<div>
    <div class="col-sm-1">
        Edit Username
    </div>
    <div class="col-sm-11 sideline">
        <form action="Routes.php" method="post">
            <input type="hidden" name="action" value="editname">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" placeholder="Name" type="text" id="userName" name="userName" value="<?php echo $_SESSION['userName'] ?>" required><br>
            </div>
            <input type="submit" value="Edit" class="btn btn-default">
        </form>
    </div>
</div>
