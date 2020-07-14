<?php
    $prodId = $_POST['productId'];
    $query = $db->selectWhere('*', 'products', 'productId', $prodId);
?>
<?php foreach($query as $result){ ?>
        <img width="100%" height="250px" src="data:image/png;base64,<?= base64_encode( $result['productImg'] ) ?>"/>
        <h2>Saving for: <?php echo ucfirst($result['productName']); ?></h2>
        <input type="hidden" value=<?php $result['productId']?>>
        <input type="submit" value="View" class="col-sm-12 btn btn-default">
<?php }; ?>