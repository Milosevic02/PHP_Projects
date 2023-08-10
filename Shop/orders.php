<?php
require_once 'inc/header.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/Order.php';
if(!$user -> is_logged()){
    header("Location: index.php");
    exit();
}

$order = new Order();
$orders = $order->get_orders();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope = "col">Order ID</th>
            <th scope = "col">Product Name </th>
            <th scope = "col">Quantity</th>
            <th scope = "col">Price</th>
            <th scope = "col">Size</th>
            <th scope = "col">Image</th>
            <th scope = "col">Delivery Address</th>
            <th scope = "col">Order Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order):?>
            <tr>
                <td><?= htmlspecialchars($order['order_id']);?></td>
                <td><?= htmlspecialchars($order['name']);?></td>
                <td><?= htmlspecialchars($order['quantity']);?></td>
                <td><?= htmlspecialchars($order['price']);?></td>
                <td><?= htmlspecialchars($order['size']);?></td>
                <td><img src="public/product_images/<?php
                     if($order['image'] === null || !file_exists("public/product_images/" . $order['image'])){
                        echo 'no-product-8316266-6632286.png';
                     }else{
                        echo $order['image'];
                     } ?>" height = "50"></td>
                <td><?= htmlspecialchars($order['delivery_address']);?></td>
                <td><?= htmlspecialchars($order['created_at']);?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php require_once 'inc/footer.php';?>
