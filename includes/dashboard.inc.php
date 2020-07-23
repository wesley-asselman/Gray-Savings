<?php
    $query = $product->getAll($_SESSION['userId']);
?>
<H1> User Dashboard for <?php echo $_SESSION['userName']; ?></h1>

<button class="btn btn-default off-white" onclick="OpenPlan()">Add new Savings plan</button>
<button class="btn btn-default off-white" onclick="OpenOptions()">User Options</button>
<div class="container noview" id="plan">
    <?php $temps->incAddPlan(); ?>
</div>
<div class="container noview" id="options">
    <?php $temps->incOptions(); ?>
</div>
<hr>
<h2>My current savings plans</h2>
<?php foreach($query as $result){ ?>
    <div class="col-sm-3 savingsitem" method="post" action="index.php?page=single-product">
        <!-- Deleteform -->
        <form class="deleteglyph" method="get" action="Routes.php">
            <input type="hidden" name="action" value="deleteproduct">
            <input type="hidden" id="productid" name="productid" value=<?php echo $result['productId'];?>>
            <div class="glyphicon glyphicon-remove"><input type="submit" value="delete" class="nobutton off-white" onclick="return confirm('Are you sure you want to delete this item?')"></div>
        </form>
        <!--End Deleteform --><br>
        <form method="post" action="index.php?page=single-product">
            <div class="savingsimagebox">
                <img width="100%" src="<?= ( $result['productImg'] ) ?>"/>
            </div>
            <h2><?php echo ucfirst($result['productName']); ?></h2>
            <p><?php echo "€ " . number_format($result['productPrice'], 2, ",", ".");?></p>
            <input type="hidden" id="productId" name="productId" value=<?php echo $result['productId'];?>>
            <input type="submit" value="View" class="col-sm-12 btn btn-default" style="margin-bottom:5px;">
        </form>
    </div>
<?php }; ?>
