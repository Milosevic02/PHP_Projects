<?php
require_once 'header.php';
require_once '../app/classes/Cart.php';
require_once '../app/classes/Order.php';


if($user -> is_logged() && $user -> is_admin()):
    $order = new Order();
    $all_id = $order -> get_id();
    foreach($all_id as $id):?>
        <?php $orders = $order->get_orders_by_id($id); ?>
        <h2>Orders by  <?=$user->get_name_by_id($id)?> with id <?=$id?></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope = "col">Order ID</th>
                    <th scope = "col">User ID</th>
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
                <?php foreach($orders as $item):?>
                    <tr>
                        <td><?= htmlspecialchars($item['order_id']);?></td>
                        <td><?= htmlspecialchars($item['user_id']);?></td>
                        <td><?= htmlspecialchars($item['name']);?></td>
                        <td><?= htmlspecialchars($item['quantity']);?></td>
                        <td><?= htmlspecialchars($item['price']);?></td>
                        <td><?= htmlspecialchars($item['size']);?></td>
                        <td><img src="../public/product_images/<?php
                            if($item['image'] === null || !file_exists("../public/product_images/" . $item['image'])){
                                echo 'no-product-8316266-6632286.png';
                            }else{
                                echo $item['image'];
                            } ?>" height = "50"></td>
                        <td><?= htmlspecialchars($item['delivery_address']);?></td>
                        <td><?= htmlspecialchars($item['created_at']);?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <a href="delete_order.php?id=<?= $id; ?>" class= "btn btn-primary">Confirm order</a><?php endforeach;?>
<?php
else:
    header('Location:../index.php');
endif;
require_once 'footer.php';?>