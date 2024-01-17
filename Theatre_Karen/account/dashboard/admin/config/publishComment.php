<?php
  include '../../../auth/dbConfig.php';

$cid = $_GET['cid'];
$stmt = $conn->prepare('UPDATE comments c
    set
    c.pending = 0
    where c.id = '.$cid.' ');

$stmt->execute();
header("Location: ../../../../a/pendingComments");
