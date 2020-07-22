<?php
if (isset($_POST['productId'])) {
    $prodId = $_POST['productId'];
} else {
    $prodId = $_SESSION['productId'];
}
$query = $product->getSingle($prodId);
$query2 = $transaction->getTransactions($prodId);

?>
<div style="min-height:260px">
    <?php foreach ($query as $result) { ?>
        <div class="col-sm-6">
            <h2>Saving for:<br><br><?php echo ucfirst($result['productName']); ?></h2>
        </div>
        <div class="col-sm-3">
            <h2>Total needed<br><br><?php echo "€ " . number_format($result['productPrice'], 2, ",", "."); ?></h2>
        </div>
        <div class="col-sm-3 singleimage">
            <img width="100%" src="<?= $result['productImg']  ?>" alt="Image didn't work!"/>
        </div>
        <div class="col-sm-7">
            <?php if ($sum >= $result['productPrice']) { ?>
                <p> You have saved enough money! Click this <a href="<?php echo $result['productLink']; ?>">link</a> to buy: <?php echo $result['productName']; ?> !
                </p>
            <?php } ?>
        </div>
    <?php }; ?>
</div>
<hr>
<div style="min-height:130px">
    <div class="col-sm-6">
        <h4>Add amount</h4>
        <form class="form-group" method="post" action="php/transaction.php">
            <input type="hidden" name="productId" value="<?php echo $prodId; ?>">
            <input class="form-control" type="text" name="posamount">
            <input type="submit" class="btn btn-default" value="Add amount">
        </form>
    </div>
    <div class="col-sm-6">
        <h4>Remove amount</h4>
        <form class="form-group" method="post" action="php/transaction.php">
            <input type="hidden" name="productId" value="<?php echo $prodId; ?>">
            <input class="form-control" type="text" name="negamount">
            <input type="submit" class="btn btn-default" value="Remove amount">
        </form>
    </div>
</div>
<hr>
<table class="table">
    <thead>
        <th>Amounts</th>
    </thead>
    <tbody>
        <?php foreach ($query2 as $result) {
            if (isset($result['amount'])) ?>
            <Tr>
                <td><?php echo "€ " . number_format($result['amount'], 2, ",", ".");; ?></td>
                <td>
                    <form method="post" action="php/deletetransaction.php">
                        <input type="hidden" name="transactionId" value="<?php echo $result['transactionId']; ?>">
                        <div class="glyphicon glyphicon-remove"><input type="submit" value="Delete" class="nobutton light-gray" onclick="return confirm('Are you sure you want to delete this item?')"></div>
                    </form>
                </td>
            </Tr>
        <?php }; ?>
        <thead>
            <th>Total saved</th>
            <th> <?php echo "€ " . number_format($sum, 2, ",", "."); ?></th>
        </thead>
    </tbody>
</table>