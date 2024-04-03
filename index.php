<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['name'])) {
    header("Location: dashboard.php");
}

include 'DBconn.php';
$conn = connect_to_database();

// Registration
if (isset($_POST['register'])) {
    // Sanitize and check for blank inputs
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $position = trim($_POST['position']);

    if (empty($name) || empty($username) || empty($password) || empty($position)){
        echo "<script>alert('Please Fill In All Fields Properly.');</script>";
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
            echo "<script>alert('Staff Username Already Exists!');</script>";
        } elseif ($result_name->num_rows > 0) {
            echo "<script>alert('Staff Name Already Exists!');</script>";
        } else {
            // No duplicate username or name found, proceed with registration
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO user_cred (username, password, name, position) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $hashed_password, $name, $position);

            if ($stmt->execute()) {
                echo "<script>alert('Staff Registered Successfully!');</script>";
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

    $stmt = $conn->prepare("SELECT `password`, `name`,`position` FROM user_cred WHERE `username` = ?");
    $stmt->bind_param("s", $login_username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password, $name, $position);
    $stmt->fetch();

    $stmt1 = $conn->prepare("SELECT `name` as `adminName`,`position` as `adminPos`  FROM user_cred WHERE `admin` =  'y'");
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($adminName, $adminPos);
    $stmt1->fetch();
    $_SESSION['AdminName'] = $adminName;
    $_SESSION['AdminPosition'] = $adminPos;
    // Verify password
    if (password_verify($login_password, $hashed_password)) {
        // Password is correct
        $_SESSION['name'] = $name;
        $_SESSION['position'] = $position;



        $stmt->close();
        $conn->close();
        header("Location: dashboard.php"); // Redirect
        exit;
    } else {
        // Password is incorrect
        echo "<script>alert('Incorrect Username or Password');</script>";
    }

    $stmt->close();
}

$conn->close();


?>


<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="./src/output.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <section class="h-screen mt-10">
        <div class="container h-full px-6 py-24 ">

            <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
                <!-- Left column container with background-->
                <div class="flex flex-col px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-10">
                        <img class="" src="assets/csfs.png" alt="Your Company" />
                        <h2 class="mt-10 text-left text-4xl font-bold leading-9 tracking-tight text-black font-poppins">
                            Welcome to <br>Department of Science and Technology</h2>
                        <p class="mt-10 text-left text-lg font-bold text-default">
                            Customer
                            Satisfaction Feedback System</p>
                    </div>

                </div>
                <span>or use your email for registeration</span> -->
                <input required name="name" type="text" placeholder="Full Name" pattern="[A-Za-z ]+"
                    title="Please enter letters only">
                <input required name="position" type="text" placeholder="Position">
                <input required name="username" type="text" placeholder="Username">

                <input required id="password" name="password" type="password" placeholder="Password"
                pattern="^[A-Za-z\d!@#$%^&*]{8,}$"
                    title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character(!@#$%^&*), and be at least 8 characters long">

                <input type="checkbox" id="showPassword">
                <label for="showPassword" class=" text-gray-100 text-sm">Show Password</label>


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
                <input required name="login_username" type="text" placeholder="Username"
                   
                    title="Username contains at least one letter and can include numbers">
                <input class="absolute left-0 px-3 py-2" required id="logpassword" name="login_password" type="password"
                    placeholder="Password">

                <input type="checkbox" id="logshowPassword">
                <label for="logshowPassword" class=" text-gray-100 text-sm">Show Password</label>

                <!-- <a href="#">Forget Your Password?</a> -->
                <button type="submit" name="login" id="login">Sign In</button>
                <a  href="admin.php">Admin?</a>
            </form>
            <!-- LOGIN AREA END -->
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of system features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>DOST - CSFS</h1>
                    <p>Register to use all of DOST system features</p>
                    <button class="hidden" id="register">Sign Up</button>

                </div>
            </div>

        </div>
    </section>

</body>
<script>
    const showPasswordCheckbox = document.getElementById("showPassword");
    const passwordField = document.getElementById("logpassword");

    showPasswordCheckbox.addEventListener("change", function () {
        const type = showPasswordCheckbox.checked ? "text" : "password";
        passwordField.setAttribute("type", type);
    });

    const logshowPasswordCheckbox = document.getElementById("logshowPassword");
    const logpasswordField = document.getElementById("logpassword");

    logshowPasswordCheckbox.addEventListener("change", function () {
        const type = logshowPasswordCheckbox.checked ? "text" : "password";
        logpasswordField.setAttribute("type", type);
    });
</script>


</html>