<?php
ob_start();

require_once 'inc/header.php';

if($student -> is_logged()){

    $id = $_GET['id'];
    $student_info = $student -> get_all_info($id);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $birth_place = $_POST['birth_place'];
        $number = $_POST['phone_number'];
        $image = $_POST['image'];

        $student -> update($id,$email,$birth_place,$number,$image);
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Successfully edited";
        header("Location: edit_data.php?id=".$id);
        exit();
    }
}
else{
    header('Location: data.php');
}

?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Edit Data</h3>
        <form action="" method= "POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class = "form-control" name = "email" value = "<?= $student_info['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="birth_place" class="form-label">Birth Place</label>
                <input type="text" name = "birth_place" value = "<?= $student_info['birth_place']; ?>" class = "form-control">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Number</label>
                <input type="text" class = "form-control" name = "phone_number" value = "<?= $student_info['phone_number']; ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name = "image" id ="photoPathInput">
                <div class="dropzone" id="dropzone-upload"></div>
            </div>
            <button type = "submit" class="btn btn-primary">Update Data</button>
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
ob_end_flush();
require_once 'inc/footer.php';
?>