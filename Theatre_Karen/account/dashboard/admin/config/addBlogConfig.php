
<?php
    session_start();
     include '../../../auth/dbConfig.php';

    $userID = $_SESSION['id'];

    $addBlog = $conn->prepare("INSERT INTO blog (title,  blog_content, img_path, show_name) VALUES(?, ?, ?, ?);");
    $addUserBlog = $conn->prepare("INSERT INTO theatre.userBlog (fk_user_id, fk_blog_id) VALUES($userID, LAST_INSERT_ID());");
    $addBlog->bind_param('ssss', $_POST['title'], $_POST['blog_content'], $_POST['img_path'], $_POST['show_name'] );
    $addBlog->execute();
    $addUserBlog->execute();
    // $addUserBlog->execute();

  

    header("Location: ../../../../blogs");

?>
