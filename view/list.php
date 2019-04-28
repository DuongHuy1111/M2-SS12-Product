<h2>List Product</h2>
<a href="./index.php?page=add" class="btn btn-warning btn-sm">Create</a>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Produce</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $item):?>
    <tr>
        <td><?php echo $item->id ?></td>
        <td><?php echo $item->nameProduct ?></td>
        <td><?php echo $item->price ?></td>
        <td><?php echo $item->description ?></td>
        <td><?php echo $item->produce ?></td>
        <td>
            <a href="index.php?page=delete&id=<?php echo $item->id ?>" class="btn btn-danger">Delete</a>
        </td>

        <td>
            <a href="index.php?page=edit&id=<?php echo $item->id ?>" class="btn btn-info">Update</a>
        </td>
    <?php endforeach; ?>

    </tr>
</tbody>
</table>