<?php
require_once '../app/classes/Product.php';
require_once "header.php";



if($user->is_logged() && $user->is_admin()): 
$products = new Product();
$products = $products -> fetch_all();
?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope = "col">Product ID</th>
                    <th scope = "col">Name </th>
                    <th scope = "col">Price</th>
                    <th scope = "col">Size</th>
                    <th scope = "col">Image</th>
                    <th scope = "col">Created At</th>
                    <th scope = "col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product):?>
                    <tr>
                        <th scope = "row"><?= $product['product_id'];?></th>
                        <td><?= htmlspecialchars($product['name']);?></td>
                        <td><?= htmlspecialchars($product['price']);?></td>
                        <td><?= htmlspecialchars($product['size']);?></td>
                        <td><?= htmlspecialchars($product['image']);?></td>
                        <td><?= htmlspecialchars($product['created_at']);?></td>
                        <td>
                            <a href="edit_product.php?id=<?= $product['product_id']; ?>" class= "btn btn-primary">Edit</a>
                            <a href="delete_product.php?id=<?= $product['product_id']; ?>" class= "btn btn-danger">Delete</a>

                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        <a href="add_product.php" class="btn btn-success">Add Product</a>
<?php else:
    header('Location:../index.php');
?>
<?php endif; ?>


<?php
require_once 'footer.php';
?>
