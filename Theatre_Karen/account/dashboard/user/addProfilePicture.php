<?php
    include '../../auth/dbConfig.php';
    $errorMsg = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetDir = "images/";
        $uploadedFile = $targetDir . basename($_FILES["img_path"]["name"]);
        $uploadedDir = basename($_FILES["img_path"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
        $errorMsg = '';
        // Check if file already exists
        if (file_exists($uploadedFile)) {
            $errorMsg = "Sorry, file already exists.";
            $uploadOk = 0;
            header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
            exit();
        }
    
        // Check file size (limit to 2MB)
        if ($_FILES["img_path"]["size"] > 2 * 1024 * 1024) {
            $errorMsg = "Sorry, your file is too large.";
            $uploadOk = 0;
            header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
            exit();

        }
    
        // Allow only certain file formats
        $allowedFormats = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($imageFileType, $allowedFormats)) {
            $errorMsg = "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = 0;
            header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
            exit();

        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errorMsg = "Sorry, your file was not uploaded.";
            header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
            exit();

        } else {
            // Move the file to the target directory
            if (move_uploaded_file($_FILES["img_path"]["tmp_name"], $uploadedFile)) {
                // Save file path in the database
                session_start();
                include '../../auth/dbConfig.php'; // Include your database configuration file
    
                $uid = $_SESSION['id'];
                $imgPath = $uploadedDir;
    
                // Update the 'img_path' column in the 'users' table for the specific user
                $updateQuery = $conn->prepare("UPDATE users SET img_path = ? WHERE id = ?");
                $updateQuery->bind_param('si', $imgPath, $uid);
                
                if ($updateQuery->execute()) {
                    $errorMsg = "Your profile picture has been successfully uploaded";
                    header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
                    exit();

                } else {
                    $errorMsg =  "Sorry, there was an error updating the database.";
                    header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
                    exit();

                }
    
                $updateQuery->close();
                $conn->close();
            } else {
                $errorMsg = "Sorry, there was an error uploading your file.";
                header("Location: ../../../u/account?err=$errorMsg"); // Redirect back to the accpunt page
                exit();

            }

        }

    }
    $_SESSION['error_message'] = $errorMsg;

