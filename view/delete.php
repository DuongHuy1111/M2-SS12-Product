<h2>Are you sure you want to delete?</h2>

<?php echo $product->nameProduct ?>

<form action="index.php?page=delete" method="post">
    <input type="hidden"  name="id" value="<?php echo $product->id ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger"/>
        <a class="btn btn-default" href="index.php">Cancel</a>
    </div>
</form>