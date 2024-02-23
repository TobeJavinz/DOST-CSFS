<!-- FORBIDDEN AREA: PHP SECTION -->
<?php
include 'DBconn.php';
$conn = connect_to_database();

// Registration
if (isset($_POST['register'])) {
    // Sanitize and check for blank inputs
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all fields properly.');</script>";
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM user_cred WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result_username = $stmt->get_result();

        // Check if name already exists
        $stmt = $conn->prepare("SELECT * FROM user_cred WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result_name = $stmt->get_result();

        if ($result_username->num_rows > 0) {
            echo "<script>alert('Username Already Exists!');</script>";
        } elseif ($result_name->num_rows > 0) {
            echo "<script>alert('Staff Name Already Exists!');</script>";
        } else {
            // No duplicate username or name found, proceed with registration
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO user_cred (username, password, name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $hashed_password, $name);

            if ($stmt->execute()) {
                echo "<script>alert('Staff Registered Successfully');</script>";
            } else {
                echo "<script>alert('Registration Error " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    }
}

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
?>
<!-- FORBIDDEN AREA: PHP SECTION -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="loginstyle.css">
    <title>CSFS</title>
</head>

<body>
    <div class="container" id="container">
        <!-- REGISTRATION AREA START -->
        <div class="form-container sign-up">
            <form action="" method="POST">
                <h1>Create Account</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span> -->
                <input required name="name" placeholder="Name">
                <input required name="username" placeholder="Username">
                <input required name="password" placeholder="Password">
                <button type="submit" name="register">Sign Up</button>
            </form>
        </div>
        <!-- REGISTRATION AREA END -->
        <!-- LOGIN AREA START-->
        <div class="form-container sign-in">
            <form action="" method="POST">
                <h1>Sign In</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span> -->
                <input required name="login_username" type="text" placeholder="Username">
                <input required name="login_password" type="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="login" id="login">Sign In</button>
            </form>
            <!-- LOGIN AREA END -->
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>DOST - CSFS</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>



    
    <script src="script.js"></script>
</body>

</html>

