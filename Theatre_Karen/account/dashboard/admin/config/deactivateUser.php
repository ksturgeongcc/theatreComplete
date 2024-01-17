<?php
session_start(); 
include '../../../auth/dbConfig.php';


// if (!isset($_SESSION['loggedin'])) {
//     header('Location: ../../../login/');
//     exit;
// }
$uid = $_GET['uid'];
$stmt = $conn->prepare('UPDATE users usr
    set
    usr.active = 0
    where id = '.$uid.' ');

$stmt->execute();
header("Location: ../../a/allUsers");
