<?php
require_once('../app/config/config.php');
require_once('../app/classes/User.php');
$user = new User();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>
  <body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a href="#" class="navbar-brand">Cysecor Shop</a>
            <button class="navbar-toggler" type="button" data-toggle = "collapse" data-target = "#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id = "navbarNav">
                <ul class = "navbar-nav">
                    <li class="nav-item active">
                        <a href="../index.php" class="nav-link">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                            
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Manage Product</a>
                    </li>

                    <li class ="nav-item">
                            <a href="order_list.php" class = "nav-link">Order List</a>
                    </li>

                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">Logout</a>
                    </li>
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




