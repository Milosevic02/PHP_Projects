<?php 
require_once "app/config/config.php";
require_once "app/classes/Student.php";
$student = new Student();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a href="#" class="navbar-brand">Student Services</a>
            <button class="navbar-toggler" type="button" data-toggle = "collapse" data-target = "#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id = "navbarNav">
                <ul class="navbar-nav ml-auto">

                    <?php if(!$student->is_logged()):?>
                        <li class="nav-item">
                            <a href="register.php" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Login</a>
                        </li>
                    <?php elseif($student->is_logged() && !$student->is_admin()) : ?>
                        <li class="nav-item">
                            <a href="data.php" class="nav-link">Your Data</a>
                        </li>
                        <li class="nav-item">
                            <a href="passed_exams.php" class="nav-link">Passed Exams</a>
                        </li>
                        <li class="nav-item">
                            <a href="remaining_exams.php" class="nav-link">Remaining Exams</a>
                        </li>
                        <li class="nav-item">
                            <a href="history.php" class="nav-link">Exams History</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['message'])) : ?> 
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role = "alert">
            <?php
                echo $_SESSION['message']['text'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>