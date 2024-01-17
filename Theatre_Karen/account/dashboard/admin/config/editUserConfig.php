<?php
session_start();
include '../../config/dbConfig.php';
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login/');
    exit;
}

include '../../partials/header.php';
$uid = $_GET['uid'];
echo $uid;
$users = $conn->prepare('SELECT 
        u.id,
        u.username,
        u.is_active,
        u.email 
       FROM user u
        -- left join image img on u.id = img.fk_user_id
        -- left join album alb on img.fk_album_id = alb.id
        WHERE u.id = '.$uid.'
     
');

$users->execute();
$users->store_result();
$users->bind_result( $uid, $username, $active, $email);
$users->fetch();

?>
<form action="updateUser.php?uid=<?= $uid ?>" method="post" enctype="multipart/form-data">
    <input type="text" value="<?= $uid?>" disabled>
    <input type="text" value="<?= $username ?>" name="username">
    <input type="text" value="<?= $active?>" name="is_active">
    <input type="text" value="<?= $email?>" name="email">
    <input type="submit" class="submit">
</form>
<?php
include '../../partials/footer.php';
?>
