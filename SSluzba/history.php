<?php 
ob_start();

require_once 'inc/header.php'; 
require_once 'app/classes/History.php';

if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}

$history = new History();
$student_id = $_SESSION['student_id'];
$history_info = $history -> get_history($student_id);

$reverseFlag = isset($_GET['reverse']) && $_GET['reverse'] === 'true';

?>
<a href="?reverse=<?= $reverseFlag ? 'false' : 'true'; ?>" class="btn btn-primary">
    <?= $reverseFlag ? 'Normal Order' : 'Reverse Order'; ?>
</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Num</th>
            <th scope="col">Name</th>
            <th scope="col">Year</th>
            <th scope="col">Date</th>
            <th scope="col">ECTS</th>
            <th scope="col">Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $num = 1;
        $history_info = $reverseFlag ? array_reverse($history_info) : $history_info;

        foreach($history_info as $his):?>
            <tr>
                <td><?= $num; $num = $num + 1;?> .</td>
                <td><?= htmlspecialchars($his['name']);?></td>
                <td><?= htmlspecialchars($his['year']);?></td>
                <td><?= htmlspecialchars($his['date']);?></td>
                <td><?= htmlspecialchars($his['ECTS']);?></td>
                <td><?= htmlspecialchars($his['grade'] === 0 ? 'ND' : $his['grade']); ?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php 
ob_end_flush();
require_once 'inc/footer.php';
?>


