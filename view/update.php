<h2>Update Product</h2>
<form method="post" action="index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
    <div class="from-group">
        <label>Name Product</label>
        <input type="text" class="form-control" name="name" value="<?php echo $product->nameProduct; ?>">
    </div>

    <div>
        <label>Price</label>
        <input type="text" class="form-control" name="price" value="<?php echo $product->price; ?>">
    </div>

    <div>
        <label>Description</label>
        <input type="text" class="form-control" name="description" value="<?php echo $product->description; ?>">
    </div>

    <div>
        <label>Produce</label>
        <input type="text" class="form-control" name="produce" value="<?php echo $product->produce; ?>">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
</form>