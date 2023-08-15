<?php 
ob_start();
require_once 'inc/header.php'; 

if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}
$id = $_SESSION['student_id'];
$student_info = $student -> get_all_info($id);
?>


<div class="row">
    <div class="col-md-4">
        <div class="form-group mt-4">
            <label for="name">Full Name:</label>
        </div>
        
        <div class="form-group mt-4">
            <label for="student_id">Student ID:</label>
        </div>

        <div class="form-group mt-4">
            <label for="program">Program:</label>
        </div>

        <div class="form-group mt-4">
            <label for="email">Email:</label>
        </div>

        <div class="form-group mt-4">
            <label for="birth_place">Birth Place:</label>
        </div>

        <div class="form-group mt-4">
            <label for="phone_number">Phone Number:</label>
        </div>

        <div class="form-group mt-4">
            <label for="accademic_year">Academic Year:</label>
        </div>

        <div class="format-group mt-4">
            <a href="edit_data.php?id=<?= $student_info['student_id']; ?>" class= "btn btn-primary">Edit Data</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['name'] ?: '-' ?></strong></span>
        </div>
        
        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['student_id'] ?: '-' ?></strong></span>
        </div>

        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['tag'] ?: '-' ?></strong></span>
        </div>

        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['email'] ?: '-' ?></strong></span>
        </div>

        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['birth_place'] ?: '-' ?></strong></span>
        </div>

        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['phone_number'] ?: '-' ?></strong></span>
        </div>

        <div class="form-group mt-4">
            <span class="form-control-static"><strong><?= $student_info['accademic_year'] ?: '-' ?></strong></span>
        </div>

    </div>

    <div class="col-md-4">
        <img src="public/student_images/<?php
            if($student_info['photo_path'] === null || !file_exists("public/student_images/" . $student_info['photo_path'])){
                echo 'photo.png';
            }else{
                echo $student_info['photo_path'];
            }?>" style = "object-fit:cover; height: 280px; width:400px">
    </div>
</div>

<?php 
ob_end_flush();
require_once 'inc/footer.php';
?>



