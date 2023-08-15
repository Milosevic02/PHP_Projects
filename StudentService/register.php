<?php
ob_start();
require_once "inc/header.php";
require_once "app/classes/Program.php";
require_once "app/classes/PassedExam.php";



if($student -> is_logged()){
    header("Location: data.php");
    exit();
}
$p = new Program();
$programs = $p -> getAll();
$exams = new PassedExam();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $program = $_POST['program'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $created = $student->create($name,$program,$email,$password);
    
    if($created > 0){
        $student_id = $created;
        $program_id = $p-> get_programs_id($program);
        $all_exams = $exams->getExams($program_id,1);
        foreach($all_exams as $exam){
            $ECTS = $exam['ECTS'];
            $exam_id = $exam['exam_id'];
            $year = $exam['year'];
            $exams -> create_rem_exam($student_id,$exam_id,$ECTS,$year);
        }
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Successfully registered account";
        header("Location: index.php");
        exit();

    }else if($created === -1){

        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "This email is already exist";
        header("Location: register.php");


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
            <div class="mb-3">
                <label for="program">Program</label>
                <select name="program" id="program" class="form-control">
                    <?php foreach ($programs as $p) : ?>
                        <option value="<?= $p['tag'] ?>"><?= $p['name'] ?></option>
                    <?php endforeach; ?>
                </select>
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
        
<?php 
ob_end_flush();

require_once 'inc/footer.php';

?>