<?php
    include '../../auth/dbConfig.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetDir = "images/";
        $uploadedFile = $targetDir . basename($_FILES["img_path"]["name"]);
        $uploadedDir = basename($_FILES["img_path"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    
        // Check if file already exists
        if (file_exists($uploadedFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    
        // Check file size (limit to 2MB)
        if ($_FILES["img_path"]["size"] > 2 * 1024 * 1024) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        // Allow only certain file formats
        $allowedFormats = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
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
                    echo "The file " . htmlspecialchars(basename($_FILES["img_path"]["name"])) . " has been uploaded and the path has been saved in the database.";
                } else {
                    echo "Sorry, there was an error updating the database.";
                }
    
                $updateQuery->close();
                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }