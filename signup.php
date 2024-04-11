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

    if (empty($name) || empty($username) || empty($password) || empty($position)) {
        echo "<script>alert('Please Fill In All Fields Properly.');</script>";
    } else {
        // Check if username or name already exists
        $stmt = $conn->prepare("SELECT * FROM user_cred WHERE username = ? OR name = ?");
        $stmt->bind_param("ss", $username, $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['username'] == $username) {
                echo "<script>alert('Staff Already Registered!');</script>";
            } else {
                echo "<script>alert('Staff Already Registered!');</script>";
            }
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
        }
            $stmt->close();
        }
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
        <div class="container px-6 py-24">
            <div class="flex  flex-wrap items-center justify-center lg:justify-between">
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
                            class="flex  flex-col justify-center bg-white rounded-md border border-gray-200 px-6 py-5 shadow-md shadow-black">
                            <div class="sm:mx-auto sm:w-full sm:max-w-sm">

                                <h2 class=" text-left text-4xl font-bold leading-9 tracking-tight text-gray-900 mt-4">
                                    Sign Up
                                </h2>
                            </div>

                            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                                <form class="space-y-6" action="" method="POST">
                                    <div>
                                        <label for="Name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <input required name="name" type="text" placeholder="Full Name"
                                              
                                                class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>
                                    <div>
                                        <label for="Username"
                                            class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                                        <div class="mt-2">
                                            <input required name="username" type="text" placeholder="Username"
                                                pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]+$"
                                                title="Username must contain at least one letter and can include numbers"
                                                class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="Position"
                                            class="block text-sm font-medium leading-6 text-gray-900">Position</label>
                                        <div class="mt-2">
                                            <input required name="position" type="text" placeholder="Position"
                                               
                                                class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex items-center justify-between">
                                            <label for="password"
                                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        </div>
                                        <div class="mt-2">
                                            <input required id="password" name="password" type="password"
                                                placeholder="Password"
                                               
                                                title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long"
                                                class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 mb-2
                                                " />
                                        </div>
                                        <input type="checkbox" id="showPassword" class="ml-4 mt-4 mb-4">
                                        <label for="showPassword" class=" text-gray-100 text-sm">Show
                                            Password</label>
                                    </div>

                                    <button type="submit" name="register"
                                        class="flex w-full justify-center rounded-md bg-custom px-3 py-1.5 mb-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Sign Up
                                    </button>

                                </form>
                                <p class="mt-10 text-center text-sm text-gray-500">
                                    Already a member?
                                    <a href="index.php"
                                        class="font-semibold leading-6 text-default hover:text-indigo-500">Please Log
                                        in!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

<br>
<br>

<script>
    const showPasswordCheckbox = document.getElementById("showPassword");
    const passwordField = document.getElementById("password");

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