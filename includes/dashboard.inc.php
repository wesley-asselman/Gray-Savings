<H1> User Dashboard for <?php echo $_SESSION['userName']; ?></h1>

<button class="btn btn-default" onclick="myFunction()">Add new Savings plan</button>
<div class="container noview" id="myDIV">
    <h2>Add plan</h2>
    <form action="php/addproduct.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Product Name</label>
            <input class="form-control" placeholder="Name" type="text" id="name" name="name" required><br>
        </div>
        <div class="form-group">
            <label>Product Link</label>
            <input class="form-control" placeholder="Link" type="text" id="Link" name="link" required><Br>
        </div>
        <div class="form-group">
            <label>Product Image</label>
            <input type="file" id="image" name="image"><br>
        </div>
        <input type="submit" value="Submit" class="btn btn-default">
    </form>
</div>
<hr>
<h2>My current savings plans</h2>
<a href="index.php?page=home">
    <div class="col-sm-4 savingsitem">
        <p>Savings Plan 1</p>
    </div>
</a>

<script>
    function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>