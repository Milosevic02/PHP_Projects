<?php
require_once 'header.php';
require '../app/classes/Product.php';


$user = new User();

if($user -> is_logged() && $user -> is_admin()){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $product = new Product();
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['photo_path'];

        $product -> create($name,$price,$size,$image);

        header("Location: index.php");
        exit();
    }
}else{
        header('Location:../index.php');
}
?>


<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Edit</h3>
        <form action="" method= "POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class = "form-control" name = "name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name = "price" step = "0.01" class = "form-control">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class = "form-control" name = "size">
            </div>
            <div class="mb-3">
                <input type="hidden" name = "photo_path" id ="photoPathInput">
                <div class="dropzone" id="dropzone-upload"></div>
            </div>
            <button type = "submit" class="btn btn-primary">Add Product</button>
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