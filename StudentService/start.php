<?php 
ob_start();
require_once 'inc/header.php'; 
require_once 'app/classes/PassedExam.php';
require_once 'app/classes/History.php';



if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}

if(!isset($_GET['exam_id'])){
    header("Location: remaining_exam.php");
    exit();
}

$history = new History();
$exam = new PassedExam();
$exam_id = $_GET['exam_id'];
$student_id = $_SESSION['student_id'];
$exam_info = $exam -> get_exam_info($exam_id);
$year = $exam_info['year'];
$rem_exam = $exam -> get_rem_exam($student_id,$year);
$foundExam = null;
foreach ($rem_exam as $exams) {
    if ($exams['exam_id'] === intval($exam_id)) {
        $foundExam = $exams;
        break;
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $exam -> simulate_exam($exam_id,$student_id,$foundExam['try_attempts']);
    $history -> add_to_history($student_id,$exam_id);
}

?>

<form method = "POST">
    <div class="form-group">
        <label for="name">Name</label>
        <span class="form-control font-weight-bold" id="name" name="name">
            <?= $exam_info['name'];?>
        </span>
    </div>
    <div class="form-group">
        <label for="year">Year</label>
        <span class="form-control font-weight-bold" id="year" name="year">
            <?= $exam_info['year'];?>
        </span>
    </div>
    <div class="form-group">
        <label for="ects">ECTS</label>
        <span class="form-control font-weight-bold" id="ects" name="ects">
            <?= $exam_info['ECTS'];?>
        </span>
    </div>
    <button type = "submit" class="btn btn-primary mt-3">Start Exam</button>
</form>

<?php
ob_end_flush();

require_once 'inc/footer.php';




