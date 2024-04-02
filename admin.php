<?php 

session_start();
if (isset($_SESSION['login'])) {
  header("Location: adminView.php");
}

// Check if the user is logged in 
include 'DBconn.php';
$conn = connect_to_database();

if (isset($_POST['login'])) {
    $login_username = $_POST['Username'];
    $login_password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT `password`, `name` FROM user_cred WHERE `username` = ? && `admin` = 'y'");
    $stmt->bind_param("s", $login_username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password, $name);
    $stmt->fetch();

    // Verify password
    if (password_verify($login_password, $hashed_password)) {
        // Password is correct
        $_SESSION['login'] = $name;
        
        $stmt->close();
        $conn->close();
        header("Location: adminView.php"); // Redirect
        echo "<script>alert('NAMES');</script>";
    } else {
      
        
        // Password is incorrect
        echo "<script>alert('Incorrect Username or Password');</script>";
    }

    $stmt->close();
}


?>


<!DOCTYPE html>
<html class="h-full bg-white">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link href="./src/output.css" rel="stylesheet" />
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <title>ADMIN</title>

  </head>

  <body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <a href="dashboard.php" class="flex items-center justify-start mb-6">
          <svg
            class="h-6 w-6 mr-2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15 19l-7-7 7-7"
            />
          </svg>
          <span class="font-semibold">Go Back</span>
        </a>
        <img
          class="mx-auto h-10 w-auto"
          src="assets/1.png"
          alt="Your Company"
        />
        <h2
          class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
        >
          Admin Login
        </h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <form class="space-y-6" action="" method="POST">
          <div>
            <label
              for="Username"
              class="block text-sm font-medium leading-6 text-gray-900"
              >Username</label
            >
            <div class="mt-2">
              <input
                id="Username"
                name="Username"
                type="text"
                autocomplete="text"
                required
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label
                for="password"
                class="block text-sm font-medium leading-6 text-gray-900"
                >Password</label
              >
            </div>
            <div class="mt-2">
              <input
                id="password"
                name="Password"
                type="password"
                autocomplete="current-password"
                required
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mb-6"
              />
            </div>
          </div>
          <button type="submit" name="login" id="login"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 mb-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
              Sign in
            </button>
        </form>
        <div>
     
    
          </a>
        </div>
      </div>
    </div>

    <script src="./src/loginscript.js"></script>
  </body>
</html>
