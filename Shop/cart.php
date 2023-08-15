<?php
require_once 'inc/header.php';
require_once 'app/classes/Cart.php';

if(!$user -> is_logged()){
    header("Location: index.php");
    exit();
}

$cart = new Cart();
$cart_items = $cart->get_cart_Items();
$total = 0;

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope = "col">Product Name</th>
            <th scope = "col">Size </th>
            <th scope = "col">Price</th>
            <th scope = "col">Quantity</th>
            <th scope = "col">Image</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($cart_items as $item):?>
            <tr>
                <td><?= htmlspecialchars($item['name']);?></td>
                <td><?= htmlspecialchars($item['size']);?></td>
                <td>$<?= htmlspecialchars($item['price']);
                        $price = floatval($item['price']);
                        $quantity = intval($item['quantity']);
                        $total = $total + $quantity*$price;
                ?></td>
                <td><?= htmlspecialchars($item['quantity']);?></td>
                <td><img src="public/product_images/<?php
                     if($item['image'] === null || !file_exists("public/product_images/" . $item['image'])){
                        echo 'no-product-8316266-6632286.png';
                     }else{
                        echo $item['image'];
                     } ?>" height = "50"></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<p style = "font-weight:bold; font-size:20px" >Total $<?= $total?></p>
<a href="checkout.php" class = "btn btn-success">Checkout</a>




<?php require_once 'inc/footer.php';?>
