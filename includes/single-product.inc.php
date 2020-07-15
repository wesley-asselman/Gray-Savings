<?php
    $prodId = $_POST['productId'];
    $query = $db->selectWhere('*', 'products', 'productId', $prodId);
?>
<div style="min-height:260px">
<?php foreach($query as $result){ ?>
    <div class="col-sm-6">
        <h2>Saving for:<br><br><?php echo ucfirst($result['productName']); ?></h2>
    </div>
    <div class="col-sm-3">
        <h2>Total needed<br><br><?php echo "€ " . number_format($result['productPrice'], 2, ",", ".");?></h2>
    </div>
    <div class="col-sm-3 singleimage">
        <img width="100%" src="data:image/png;base64,<?= base64_encode( $result['productImg'] ) ?>"/>
    </div>
    <div class="col-sm-7">

    </div>
<?php }; ?>
</div>
<hr>
