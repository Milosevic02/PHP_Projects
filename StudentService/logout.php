<?php
ob_start();

require_once 'inc/header.php';
if(!$student -> is_logged()){
    header("Location: index.php");
    exit();
}
$student -> logout();

header('Location: index.php');
exit();
ob_end_flush();
require_once 'inc/footer.php';