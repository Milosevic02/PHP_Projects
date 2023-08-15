<?php 
ob_start();

require_once 'inc/header.php';
if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}

?>

<h1>Congratulations, you have completed your studies and graduated!</h1>

<a href="data.php" class="btn btn-danger mt-3">Exit</a>
<?php 
ob_end_flush();
require_once 'inc/footer.php';
?>
