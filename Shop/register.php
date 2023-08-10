<?php
require_once "inc/header.php";
require_once "app/classes/User.php";

if($user -> is_logged()){
    header("Location: index.php");
    exit();
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $crated = $user->create($name,$username,$email,$password);

        if($crated){
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['text'] = "Successfully registered account";
            header("Location: index.php");
            exit();
        }else{
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Error";
            header("Location: register.php");
        }

    }

?>

        <h1 class="mt-5 mb-3">Registration</h1>
        <form method="post" action="">
            <div class="form-group mb-3">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id = "name" name = "name" required>
            </div>
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class = "form-control" id = "username" name = "username" required>

            </div>

            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input type="text" class = "form-control" id = "email" name = "email" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class = "form-control" id = "password" name = "password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
<?php require_once "inc/footer.php";