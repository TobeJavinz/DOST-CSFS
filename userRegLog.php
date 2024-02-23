<?php
include 'DBconn.php';
$conn = connect_to_database();



// Login
if (isset($_POST['login'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    $stmt = $conn->prepare("SELECT `password` FROM user_cred WHERE `username` = ?");
    $stmt->bind_param("s", $login_username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verify password
    if (password_verify($login_password, $hashed_password)) {
        // Password is correct
        // You can add additional logic here if needed, such as setting session variables

        $stmt->close();
        $conn->close();
        header("Location: dashboard.html"); // Redirect to dashboard.php if login is successful
        exit;
    } else {
        // Password is incorrect
        echo "<script>alert('Incorrect username or password');</script>";
    }

    $stmt->close();
}

$conn->close();



