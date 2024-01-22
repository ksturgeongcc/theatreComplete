<?php

include '../../../auth/dbConfig.php';

$bid = $_GET['bid'];
$stmt = $conn->prepare('UPDATE blog b
    set
    b.published = 1
    where b.id = '.$bid.' ');

$stmt->execute();
header("Location: ../../../../blogs");
?>
