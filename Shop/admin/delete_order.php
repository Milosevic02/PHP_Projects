<?php
require '../app/config/config.php';
require '../app/classes/User.php';
require '../app/classes/Cart.php';
require '../app/classes/Order.php';


$user = new User();

if($user -> is_logged() && $user -> is_admin()){
    $order = new Order();

    $user_id = $_GET['id'];

    $order->delete($user_id);

    header("Location: order_list.php");
}else{
    header('Location:../index.php');
}