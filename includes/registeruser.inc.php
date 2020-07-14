<div class="container">
    <h2>Register</h2>
    <form action="php/adduser.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" placeholder="Name" type="text" id="name" name="name" required><br>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" placeholder="Password" type="password" id="password" name="password" required><Br>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" placeholder="Email" type="email" id="email" name="email" required><Br>
        </div>
        <input type="submit" value="Submit" class="btn btn-default">
    </form>
</div>