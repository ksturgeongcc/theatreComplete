<?php
session_start();
    include '../../auth/dbConfig.php';
    $uid = $_SESSION['id'];
    

$targetDir = "images/";
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
                $addProfileImg = $conn->prepare("UPDATE users set img_path = ? where id = $uid ");
                $addProfileImg->bind_params('s', $_POST['img_path']);
                $addProfileImg->execute();
                if($addProfileImg){
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