<?php 
ob_start();

require_once 'inc/header.php'; 
require_once 'app/classes/PassedExam.php';

if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}

$exams = new PassedExam();
$student_id = $_SESSION['student_id'];
$pass_exam = $exams -> get_pass_exam($student_id);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope = "col">Num</th>
            <th scope = "col">Name</th>
            <th scope = "col">Year </th>
            <th scope = "col">Grade</th>
            <th scope = "col">ECTS</th>


        </tr>
    </thead>
    <tbody>
        <?php $num = 1; $total = 0 ;$avg = 0; $sum = 0; 
             foreach($pass_exam as $exam):?>
                <tr>
                    <td><?= $num; $num = $num + 1;?> .</td>
                    <td><?= htmlspecialchars($exam['name']);?></td>
                    <td><?= htmlspecialchars($exam['year']);?></td>
                    <td><?= htmlspecialchars($exam['grade']); $sum = ($sum + intval($exam['grade']));$avg = $sum/ ($num-1);?></td>
                    <td><?= htmlspecialchars($exam['ECTS']); $total = $total + intval($exam['ECTS']);?></td>
                </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div style="text-align: right;">
    <p style="font-weight: bold; font-size: 20px; display: inline-block;">Average Grade : <?= number_format($avg, 2)?></p>
    <p style="font-weight: bold; font-size: 20px; display: inline-block; margin-left: 20px;">Total ECTS : <?= $total?></p>
</div>
<?php 
ob_end_flush();

require_once 'inc/footer.php'; ?> 