<?php 
ob_start();

require_once 'inc/header.php'; 
require_once 'app/classes/Program.php';
if($student -> is_logged()){
    header("Location: data.php");
    exit();
}
$program = new Program();
$programs = $program -> getAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $program = $_POST['program'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $student->login($program,$email,$password);

    if(!$result){
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'Incorrect username or password or program';
        header("Location: index.php");
        exit();
    }

    header("Location: data.php");
    exit();

}

?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Login</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="program">Program</label>
                <select name="program" id="program" class="form-control">
                    <?php foreach ($programs as $p) : ?>
                        <option value="<?= $p['tag'] ?>"><?= $p['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
<?php
ob_end_flush();
require_once 'inc/footer.php'; ?> 