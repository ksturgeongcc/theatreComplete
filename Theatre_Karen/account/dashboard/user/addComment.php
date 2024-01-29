
 <?php
    session_start();
     include '../../auth/dbConfig.php';

    $blogID = $_GET['blog_id'];
    $userID = $_SESSION['id'];



    $addUserBlog = $conn->prepare("INSERT INTO userBlog (fk_user_id, fk_blog_id) VALUES($userID, $blogID);");
    $addComment = $conn->prepare("INSERT INTO comments (heading, comment, fk_userBlog, pending) VALUES(?, ?, LAST_INSERT_ID(), 1);");
    $addComment->bind_param('ss', $_POST['heading'], $_POST['comment'] );
    $addUserBlog->execute();
    $addComment->execute();

    header("Location: ../../../blogDetails/$blogID");

?>
