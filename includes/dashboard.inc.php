<?php
    $query = $product->getAll($_SESSION['userId']);
?>
<H1> User Dashboard for <?php echo $_SESSION['userName']; ?></h1>

<button class="btn btn-default off-white" onclick="OpenClose()">Add new Savings plan</button>
<div class="container noview" id="myDIV">
    <h2>Add plan</h2>
    <form action="Routes.php" method="post">
    <input type="hidden" value="products" name="action">
    <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="userId">
        <div class="form-group">
            <label>Product Name</label>
            <input class="form-control" placeholder="Name" type="text" id="productName" name="productName" required><br>
        </div>
        <div class="form-group">
            <label>Product Link</label>
            <input class="form-control" placeholder="Link" type="text" id="productLink" name="productLink" required><Br>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input class="form-control" placeholder="Price" type="text" id="productPrice" name="productPrice" required><Br>
        </div>
        <div class="form-group">
            <label>Product Image</label>
            <input class="form-control" type="text" id="productImg" name="productImg"><br>
        </div>
        <input type="submit" value="Submit" class="off-white btn btn-default">
    </form>
</div>
<hr>
<h2>My current savings plans</h2>
<?php foreach($query as $result){ ?>
    <div class="col-sm-3 savingsitem" method="post" action="index.php?page=single-product">
        <form class="deleteglyph" method="post" action="Routes.php">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" id="productId" name="productId" value=<?php echo $result['productId'];?>>
            <div class="glyphicon glyphicon-remove"><input type="submit" value="Delete" class="nobutton off-white" onclick="return confirm('Are you sure you want to delete this item?')"></div>
        </form>
        <form method="post" action="index.php?page=single-product">
            <div class="savingsimagebox">
                <img width="100%" src="<?= ( $result['productImg'] ) ?>"/>
            </div>
            <h2><?php echo ucfirst($result['productName']); ?></h2>
            <input type="hidden" id="productId" name="productId" value=<?php echo $result['productId'];?>>
            <input type="submit" value="View" class="col-sm-12 btn btn-default" style="margin-bottom:5px;">
        </form>
    </div>
<?php }; ?>
