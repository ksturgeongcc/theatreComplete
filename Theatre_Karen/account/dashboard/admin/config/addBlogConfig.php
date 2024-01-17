
<?php
    session_start();
     include '../../../auth/dbConfig.php';

    $userID = $_SESSION['id'];

    $statusMsg = '';



    // $addBlog = $conn->prepare("INSERT INTO blog (title,  blog_content, img_path, show_name) VALUES(?, ?, ?, ?);");
    // $addUserBlog = $conn->prepare("INSERT INTO theatre.userBlog (fk_user_id, fk_blog_id) VALUES($userID, LAST_INSERT_ID());");
    // $addBlog->bind_param('ssss', $_POST['title'], $_POST['blog_content'], $_POST['img_path'], $_POST['show_name'] );
    // $addBlog->execute();
    // $addUserBlog->execute();
    // $addUserBlog->execute();

    // File upload path
    $targetDir = "../../../../assets/images/shows/";
    $fileName = basename($_FILES["img_path"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    if(isset($_POST["submit"]) && !empty($_FILES["img_path"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            
            if(move_uploaded_file($_FILES["img_path"]["tmp_name"], $targetFilePath)){
                if ($_FILES["img_path"]["error"] > 0) {
                    $statusMsg = "Error: " . $_FILES["img_path"]["error"];
                }
                // Insert image file name into database
                $addBlog = $conn->prepare("INSERT INTO blog (title, blog_content, img_path, show_name) VALUES(?, ?, '".$fileName."', ?);");
                $addUserBlog = $conn->prepare("INSERT INTO userBlog (fk_user_id, fk_blog_id) VALUES($userID, LAST_INSERT_ID());");
                $addBlog->bind_param('sss', $_POST['title'], $_POST['blog_content'], $_POST['show_name'] );

                $addBlog->execute();
                $addUserBlog->execute();
                if($addBlog){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    header("Location: ../../../../blogs");

?>