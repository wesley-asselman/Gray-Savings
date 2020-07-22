<div class="container">
    <h2>Register</h2>
    <form action="Routes.php" method="post">
        <input type="hidden" name="action" value="register">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" placeholder="Name" type="text" id="userName" name="userName" required><br>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" placeholder="Password" type="password" id="userPassword" name="userPassword" required><Br>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" placeholder="Email" type="email" id="userEmail" name="userEmail" required><Br>
        </div>
        <input type="submit" value="Submit" class="btn btn-default">
    </form>
</div>