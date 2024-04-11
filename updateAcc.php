<?php 
require 'DBConn.php';
include "session_auth.php";
// Establish database connection
$conn = connect_to_database();

$UserID = "";


$errormessage = "";
$successmessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["UserID"])) {
        echo "NO";
        exit;
    }

    $UserID = $_GET["UserID"];

    $sql = "SELECT * FROM user_cred WHERE UserID= $UserID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row == null) {
        echo "NO";
                exit;
    }
    
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserID = $_GET["UserID"];
    $position = $_POST['position'];
    $admin = $_POST['admin'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $name = $_POST['name'];

    $query = "UPDATE user_cred SET ";
    $params = [];
    $types = "";

    if (!empty($name)) {
        $query .= "`name` = ?, ";
        $params[] = $name;
        $types .= "s";
    }


    if (!empty($position)) {
        $query .= "`position` = ?, ";
        $params[] = $position;
        $types .= "s";
    }

    if (!empty($admin)) {
        $query .= "`admin` = ?, ";
        $params[] = $admin;
        $types .= "s";
    }

    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query .= "`password` = ?, ";
        $params[] = $password;
        $types .= "s";
    }
    if(!empty($username)){
        $query .= "`username` = ?, ";
        $params[] = $username;
        $types .= "s";
    }

    // Remove the last comma and space, and add the WHERE clause
    $query = substr($query, 0, -2) . " WHERE UserID = ?";
    $params[] = $UserID;
    $types .= "i";

    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();

    echo "<script>alert('Account Updated'); window.location.href='manageAcc.php';</script>";
}


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="./src/output.css" rel="stylesheet" />
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <title>CSFS | USER </title>
</head>

<body class="text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <?php include 'sidebar.php' ?>
    <!-- end: Sidebar -->


    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <?php
        $headerText = "Edit";
        include 'header.php';
        ?>

        <!-- content -->

        <form method="post" action="" autocomplete="on">
            <div class="p-6">
                <div class="grid grid-cols-1 ">
                   

                    <div class="bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black">
                        <div class="text-3xl text-default font-bold mb-5">
                            Manage Account 
                        </div>


                    
                        
                        <hr class="mt-6">
                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xl font-semibold text-gray-900">
                            <?php echo "Username: " ?> <i><strong> <?php echo $row['username'] ?> </strong></i></label>
                        </div>

                        <div class="mt-10">
                        <label class="text-sm leading-6 text-gray-900">
                                       Name
                                    </label>
                            <div class="mt-2">
                        
                                <input name="name" value="<?php echo $row['name'] ?>" 
                                    class="w-48 rounded-md font-bold py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" 
                                    
                                     />
                        </div>

                        <div class="mt-10">
                        <label class="text-sm leading-6 text-gray-900">
                                       Username
                                    </label>
                            <div class="mt-2">
                        
                            <div class="mt-2">
                                            <input  name="username" type="text" value="<?php echo $row['username'] ?>" 
                                                pattern="^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]+$"
                                                title="Username must contain at least one letter and can include numbers"
                                                class="w-48 rounded-md font-bold py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" >
                                        </div>
                        </div>

                        <div class="mt-10">
                        <label class="text-sm leading-6 text-gray-900">
                                       Admin Priviledges (y/n)
                                    </label>
                            <div class="mt-2">
                        
                                <input name="admin" value="<?php echo $row['admin'] ?>" 
                                    class="w-48 rounded-md font-bold py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" 
                                    pattern="[yn]" 
                                    title="Please enter 'y' or 'n' only" 
                                     />
                        </div>

                        <div class="mt-10">
                        <label class="text-sm leading-6 text-gray-900">
                                       Position
                                    </label>
                            <div class="mt-2">
                        
                                <input name="position" value="<?php echo $row['position'] ?>" 
                                    class="w-48 rounded-md font-bold py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" 
                                     />
                        </div>
                        </div>

                        <div class="mt-10">
                       
                        <div class="mt-2">
                      
                        <input  id="password" name="password" type="password"
                                                placeholder="Change Password"
                                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$"
                                                title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long"
                                                class="w-48 rounded-md font-bold py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />


                        </div>
                        </div>

    
                    <div class="flex justify-end mt-6">
                    <button 
                        type="button"
                        class="bg-black text-white rounded-md px-4 py-2 text-sm font-semibold mr-3"
                        onclick="window.history.back()">Cancel</button>

                        <button type="submit"
                            class="bg-indigo-600 text-white rounded-md px-4 py-2 text-sm font-semibold">Update</button>
                           
</form>

    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./src/dashboard.js"></script>
</body>

</html>