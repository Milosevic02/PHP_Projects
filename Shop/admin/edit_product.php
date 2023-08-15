<?php
require_once 'header.php';
require '../app/classes/Product.php';


$user = new User();

if($user -> is_logged() && $user -> is_admin()){

    $product_obj = new Product();
    $product = $product_obj -> read($_GET['id']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $product_id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $product_obj -> update($product_id,$name,$price,$size,$image);
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Successfully edited";
        header("Location: edit_product.php?id=".$product_id);
        exit();
    }
}
else{
    header('Location:../index.php');
}
?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Edit</h3>
        <form action="" method= "POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class = "form-control" name = "name" value = "<?= $product['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name = "price" step = "0.01" value = "<?= $product['price']; ?>" class = "form-control">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class = "form-control" name = "size" value = "<?= $product['size']; ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name = "image" id ="photoPathInput">
                <div class="dropzone" id="dropzone-upload"></div>
            </div>
            <button type = "submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    Dropzone.options.dropzoneUpload = {
        url:"upload_photo.php",
        paramName: "photo",
        maxFilesize:30,
        acceptedFiles: "image/*",
        init: function (){
            this.on("success",function(file,response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById('photoPathInput').value = jsonResponse.photo_path;
                }else{
                    console.error(jsonResponse.error);
                }
            });
        }
    };
</script>

<?php
require_once 'footer.php';
?>