<?php
include 'DBconn.php';
$conn = connect_to_database();

// Registration
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user_cred ( `username`, `password`, `name`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username,$hashed_password, $name);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Login
if(isset($_POST['login'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    $stmt = $conn->prepare("SELECT `password` FROM user_cred WHERE `username` = ?");
    $stmt->bind_param("s", $login_username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($login_password, $hashed_password)) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();

