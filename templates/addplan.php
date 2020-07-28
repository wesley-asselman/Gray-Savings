<h3>Add plan</h3>
    <form action="Routes.php" method="post">
    <input type="hidden" value="products" name="action">
    <input type="hidden" value="<?php echo $data['id']?>" name="userId">
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