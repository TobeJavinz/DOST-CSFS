<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['name'])) {
    header("Location: dashboard.php");
}

include 'DBconn.php';
$conn = connect_to_database();

// Login
if (isset($_POST['login'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    $stmt = $conn->prepare("SELECT `password`, `name`, `position` FROM user_cred WHERE `username` = ?");
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


                <!-- Right column container with form -->
                <div class="md:w-8/12 lg:ms-6 lg:w-5/12">
                    <div class="min-h-full justify-center lg:px-8 " style="width: 500px; height: 400px;">
                        <div
                            class="flex min-h-full flex-col justify-center bg-white rounded-md border border-gray-200 px-6 py-5 shadow-md shadow-black">
                            <div class="sm:mx-auto sm:w-full sm:max-w-sm">


                                <h2 class=" text-left text-4xl font-bold leading-9 tracking-tight text-gray-900 mt-4">
                                    Sign In
                                </h2>
                            </div>

                            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                                <form class="space-y-6" action="" method="POST">
                                    <div>
                                        <label for="email"
                                            class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                                        <div class="mt-2">
                                            <input required name="login_username" type="text" placeholder="Username"
                                                pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]+$"
                                                title="Username contains at least one letter and can include numbers"
                                                class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <div>
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <label for="password"
                                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                            </div>
                                            <div class="mt-2">
                                                <input required id="logpassword" name="login_password" type="password"
                                                    placeholder="Password" class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 mb-2
                                                " />
                                            </div>
                                            <input type="checkbox" id="showPassword" class="ml-4 mt-4 mb-4">
                                            <label for="showPassword" class=" text-gray-100 text-sm">Show
                                                Password</label>
                                        </div>

                                        <div>
                                            <a href="dashboard.php">
                                                <button type="submit" name="login" id="login"
                                                    class="flex w-full justify-center rounded-md bg-custom px-3 py-1.5 mb-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 mt-2 ">
                                                    Sign in
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <p class="mt-6 text-center text-sm text-gray-500">
                                    Not yet a member?
                                    <a href="signup.php" class="font-semibold leading-6 text-default ">Sign
                                        Up
                                        now!</a>
                                </p>
                                <p class=" mt-4 text-center text-sm text-gray-500">
                                    Are you an admin?
                                    <a href="admin.php" class="font-semibold leading-6 text-default ">Login here!</a>
                                </p>

                            </div>
                        </div>
                    </div>
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