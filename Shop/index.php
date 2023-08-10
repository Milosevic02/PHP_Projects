<?php
require_once "inc/header.php"; 
require_once 'app/classes/Product.php';

$products = new Product();
$products = $products ->fetch_all();
?>

<div class="row">
    <?php foreach($products as $product): ?>
        <div class="col-md-3" >
            <div class="card">
                <img src="public/product_images/<?php
                     if($product['image'] === null || !file_exists("public/product_images/" . $product['image'])){
                        echo 'no-product-8316266-6632286.png';
                     }else{
                        echo $product['image'];
                     } ?>" class="card-img-top" style = "height:130px; object-fit:cover;width:150px"  >
                <div class="card-body">
                    <h5 class="card-title"><?=$product['name']?></h5>
                    <p class="card-text">Size:<?= $product['size'] ?></p>
                    <p class="card-text">Price:<?=$product['price']?></p>
                    <a href="product.php?product_id=<?= $product['product_id'] ?>" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>
    <?php endforeach;?>


</div>





<?php require_once "inc/footer.php";?>
    
