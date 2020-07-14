<?php
    $query = $db->selectWhere('*', 'products', 'userId', $_SESSION['userId'])
?>
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
<?php foreach($query as $result){ ?>
    <form class="col-sm-3 savingsitem" method="post" action="index.php?page=single-product">
        <div class="glyphicon glyphicon-remove">Delete</div>
        <div class="glyphicon glyphicon-edit editglyph">Edit</div>
            <img width="100%" height="250px" src="data:image/png;base64,<?= base64_encode( $result['productImg'] ) ?>"/>
            <?php echo $result['productId'] ?>
            <h2><?php echo ucfirst($result['productName']); ?></h2>
            <input type="hidden" id="productId" name="productId" value=<?php echo $result['productId'];?>>
            <input type="submit" value="View" class="col-sm-12 btn btn-default">
        </form>
<?php }; ?>

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