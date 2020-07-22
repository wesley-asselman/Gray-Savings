<div class="container">
    <h2>Login</h2>
    <form action="Routes.php" method="post" >
        <input type="hidden" name="action" value="login">
        <div class="form-group">
            <label>Email-address</label>
            <input class="form-control" placeholder="Email" type="Email" id="userEmail" name="userEmail"><br>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" placeholder="Password" type="Password" id="userPassword" name="userPassword"><Br>
        </div>
        <input type="submit" value="Submit" class="btn btn-default">
    </form>
</div>