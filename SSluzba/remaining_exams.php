<?php 
ob_start();
require_once 'inc/header.php'; 
require_once 'app/classes/Program.php';

require_once 'app/classes/PassedExam.php';

if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}

$exams = new PassedExam();
$p = new Program();
$programs = $p -> getAll();
$student_id = $_SESSION['student_id'];
$student_info = $student -> get_all_info($student_id);
$year = $student_info['accademic_year'];
$rem_exam = $exams -> get_rem_exam($student_id,$year);
if(count($rem_exam) === 0){
    if($student -> next_year($student_id,$year)){
        $student -> next_year($student_id,$year);
        $student_info = $student -> get_all_info($student_id);
        $year = $student_info['accademic_year'];
        $program_id = $p-> get_programs_id($student_info['program']);
        $all_exams = $exams->getExams($program_id,$year);
        foreach($all_exams as $exam){
            $ECTS = $exam['ECTS'];
            $exam_id = $exam['exam_id'];
            $year = $year;
            $exams -> create_rem_exam($student_id,$exam_id,$ECTS,$year);
        }
        $rem_exam = $exams -> get_rem_exam($student_id,$year);
        header("Location: remaining_exams.php");
    }else{
        header("Location: end.php");
    }

}

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope = "col">Num</th>
            <th scope = "col">Name</th>
            <th scope = "col">Year </th>
            <th scope = "col">Try Attempts</th>
            <th scope = "col">ECTS</th>
            <th scope = "col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1;
             foreach($rem_exam as $exam):?>
                <tr>
                    <td><?= $num; $num = $num + 1;?> .</td>
                    <td><?= htmlspecialchars($exam['name']);?></td>
                    <td><?= htmlspecialchars($exam['year']);?></td>
                    <td><?= htmlspecialchars($exam['try_attempts']);?></td>
                    <td><?= htmlspecialchars($exam['ECTS']);?></td>
                    <td>
                        <a href="start.php?exam_id=<?=$exam['exam_id'];?>" class="btn btn-primary">Start Exam</a>
                    </td>

                </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php
ob_end_flush();

require_once 'inc/footer.php'; ?> 

