<?php
require '../app/config/config.php';
require '../app/classes/User.php';
require '../app/classes/Product.php';


$user = new User();

if($user -> is_logged() && $user -> is_admin()){
    $product = new Product();

    $product_id = $_GET['id'];

    $product->delete($product_id);

    header("Location: index.php");
}else{
    header('Location:../index.php');
}
