<?php
require_once 'inc/header.php';
require_once 'app/classes/Product.php';
require_once 'app/classes/Cart.php';


$product =  new Product();
$product = $product->read($_GET['product_id']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $product['product_id'];

    $user_id = $_SESSION['user_id'];

    $quantity = $_POST['quantity'];
    $cart = new Cart($conn);
    $cart->add_to_cart($user_id,$product_id,$quantity);

    if(isset($_POST['continue'])){
        header("Location: index.php");
    }else if(isset($_POST['cart'])){
        header("Location: cart.php");
    }
    exit();

}

?>

<div class="row">
    <div class="col-lg-6">
                <img src="public/product_images/<?php
                     if($product['image'] === null || !file_exists("public/product_images/" . $product['image'])){
                        echo 'no-product-8316266-6632286.png';
                     }else{
                        echo $product['image'];
                     } ?>" class="image-fluid" style = "height:130px; object-fit:cover;width:150px"  >
    </div>
    <div class="col-lg-6">
        <h2><?=$product['name'];?></h2>
        <p>Size: <?= $product['size'];?></p>
        <p>Price: $<?= $product['price']; ?></p>
        <form action="" method = "post">
            <?php if($user -> is_logged() && !$user->is_admin()):?>
                <input type="number" name = "quantity" required>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Add to Cart</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Do you want to continue shopping or go to the cart?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name = "cart" >Go to cart</button>
                        <button type="submit" class="btn btn-primary" name = "continue">Continue</button>
                    </div>
                    </div>
                </div>
                </div>
            <?php endif;?>
        </form>
    </div>
</div>



<?php require_once 'inc/footer.php';?>