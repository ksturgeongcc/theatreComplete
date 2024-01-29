<?php
include 'dbConfig.php';

if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
    exit('Username is not valid!');
}
// Password must be between 5 and 20 characters long.
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}
// We need to check if the account with that username exists.
$stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ? ');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$stmt->store_result();
// Store the result so we can check if the account exists in the database.
if ($stmt->num_rows > 0) {
    // Username already exists
    echo 'Username exists! Please choose another.';
} else {
    $stmt->close();
    // Username doesnt exists, insert new account
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, active, is_admin) VALUES(?, ?, ?, 1, 0);");
  
   
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
    $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
    $stmt->execute();
    $conn->close();

    echo '<p>You have successfully created an account</p> <a href="../login">Return to Login page</a>';

}

header('Location: ../../login');
