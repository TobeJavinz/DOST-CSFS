<?php

include 'DBConn.php';
// Establish database connection
$conn = connect_to_database();

// Check if ServiceID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "SELECT * FROM data WHERE ServiceID = '$id' ";
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if (!$result) {
        // Fetch data from the result
        die("query Failed" . mysqli_error());


    } else {
        // Query failed, handle the error
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    }

}



if (isset($_POST['update'])) {

    if (isset($_GET['id_new'])) {

        $idnew = $_GET['id_new'];
    }

    $cc1_1 = $_POST["cc1_1"];
    $cc1_2 = $_POST["cc1_2"];
    $cc1_3 = $_POST["cc1_3"];
    $cc2_1 = $_POST["cc2_1"];
    $cc2_2 = $_POST["cc2_2"];
    $cc3_1 = $_POST["cc3_1"];
    $cc3_2 = $_POST["cc3_2"];
    $service = $_POST["service"];
    $training_name = $_POST["training_name"];
    $date = $_POST["date"];
    $training_venue = $_POST["training_venue"];
    $training_type = $_POST["training_type"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $sex = $_POST["sex"];
    $email = $_POST["email"];
    $contact_info = $_POST["contact_info"];
    $home_add = $_POST["home_add"];
    $age = $_POST["age"];
    $designation = $_POST["designation"];
    $company = $_POST["company"];
    $msme = $_POST["msme"];
    $customer_category = $_POST["customer_category"];
    $sector = $_POST["sector"];
    $returning_customer = $_POST["returning_customer"];
    $sqd0 = $_POST["sqd0"];
    $sqd1 = $_POST["sqd1"];
    $sqd2 = $_POST["sqd2"];
    $sqd3 = $_POST["sqd3"];
    $sqd4 = $_POST["sqd4"];
    $sqd5 = $_POST["sqd5"];
    $sqd6 = $_POST["sqd6"];
    $sqd7 = $_POST["sqd7"];
    $sqd8 = $_POST["sqd8"];
    $net_promoter = $_POST["net_promoter"];
    $ateneo = $_POST["ateneo"];
    $doa = $_POST["doa"];
    $dti = $_POST["dti"];
    $fda = $_POST["fda"];
    $sbc = $_POST["sbc"];
    $tesda = $_POST["tesda"];
    $uic = $_POST["uic"];
    $other_agency = $_POST["other_agency"];
    $other_agency_score = $_POST["other_agency_score"];
    $overall_mood = $_POST["overall_mood"];
    $comments = $_POST["comments"];


    $query = "update 'data' set 'cc1_1' = '$cc1_1', 'cc1_2' = '$cc1_2', 'cc1_3' = '$cc1_3', 'cc2_1' = '$cc2_1',
     'cc2_2' = '$cc2_2', 'cc3_1' = '$cc3_1', 'cc3_2' = '$cc3_2',
      'service' = '$service', 'training_name' = '$training_name',
       'date' = '$date', 'training_venue' = '$training_venue', 'training_type' = '$training_type', 'fname' = '$fname',
        'lname' = '$lname', 'sex' = '$sex', 'email' = '$email', 'contact_info' = '$contact_info', 'home_add' = '$home_add',
         'age' = '$age', 'designation' = '$designation', 'company' = '$company', 'msme' = '$msme', 'customer_category' = '$customer_category',
          'sector' = '$sector', 'returning_customer' = '$returning_customer', 'sqd0' = '$sqd0', 'sqd1' = '$sqd1', 'sqd2' = '$sqd2', 'sqd3' = '$sqd3', 'sqd4' = '$sqd4', 'sqd5' = '$sqd5', 'sqd6' = '$sqd6', 'sqd7' = '$sqd7', 'sqd8' = '$sqd8',
           'net_promoter' = '$net_promoter', 'ateneo' = '$ateneo', 'doa' = '$doa', 'dti' = '$dti', 'fda' = '$fda', 'sbc' = '$sbc', 'tesda' = '$tesda',
            'uic' = '$uic', 'other_agency' = '$other_agency', 'other_agency_score' = '$other_agency_score',
             'overall_mood' = '$overall_mood', 'comments' = '$comments' where 'ServiceID' = $id_new ";

    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if (!$result) {
        // Fetch data from the result
        die("query Failed" . mysqli_error());


    } else {
        header('location:tables.php?update_msg=You Have succeed.');
    }
}



?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="./src/output.css" rel="stylesheet" />
</head>

<body class="text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <!-- <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="./assets/1.png" alt="" class="w-8 h-8 rounded object-cover" />
            <span class="text-lg font-bold text-white ml-3">DOST CSFS</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group">
                <a href="./dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-survey-line mr-3 text-lg"></i>
                    <span class="text-sm">Forms</span>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="./reports.html"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-file-chart-line mr-3 text-lg"></i>
                    <span class="text-sm">Reports</span>
                </a>
            </li>
            <li class="mb-1 group active">
                <a href="./index2.html"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-admin-line mr-3 text-lg"></i>
                    <span class="text-sm">Admin</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div> -->
    <!-- end: Sidebar -->


    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a class="text-base text-black font-bold">Admin</a>
                </li>
            </ul>

            <!-- profile avatar dropdown -->
            <ul class="ml-auto flex items-center">
                <!-- avatar -->
                <li class="dropdown ml-3">
                    <button type="button" class="dropdown-toggle flex items-center">
                        <img src="https://placehold.co/32x32" alt=""
                            class="w-8 h-8 rounded block object-cover align-middle" />
                    </button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- content -->
        <div class="p-6">
            <div class="grid grid-cols-1 gap-6">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md s  hadow-black/5">
                    <!-- diri isulod na div -->
                    <section>
                        <div class="container">
                            <div class="flex flex-wrap -mx-4">
                                <div class="w-full overflow-x-auto">
                                    <table class="table-auto w-max">
                                        <thead>
                                            <tr>

                                                <th
                                                    class="w-1/32 min-w-[10px] text-l font-bold text-black px-3 text-center lg:px-4 border">
                                                    cc1_1
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-l font-bold text-black px-3 text-center lg:px-4 border">
                                                    cc1_2
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-l font-bold text-black px-3 text-center lg:px-4 border">
                                                    cc1_3
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-l font-bold text-black px-3 text-center lg:px-4 border">
                                                    cc2_1
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    cc2_2
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    cc3_1
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    cc3_2
                                                </th>


                                                <th
                                                    class="w-1/32 min-w-[200px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Service
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Training Name
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[200px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Date
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Training Venue
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Training Type
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    First Name
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Last Name
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Sex
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 text-center">
                                                    Email
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 text-center">
                                                    Contact Info
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 text-center">
                                                    Address
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Age
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Designation
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Company
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    MSME?
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Customer Category
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Sector
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Returning Customer
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    sqd0
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    sqd1
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    sqd2
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    sqd3
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    sqd4
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    sqd5
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    sqd6
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    sqd7
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    sqd8
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Net Promoter
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    ateneo
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Doa
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    DTI
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    FDA
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    SBC
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    TESDA
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    UIC
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    other agency
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Agency score
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                                    Over-all Mood
                                                </th>

                                                <th
                                                    class="w-1/32 min-w-[100px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Comments
                                                </th>
                                                <th
                                                    class="w-1/32 min-w-[400px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <form action="tablestest.php?id_new=<?php echo $id; ?>" method="post">
                                            <tbody>
                                                <tr class=" text-center">

                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc1_1"
                                                                value="<?php echo $row['cc1_1'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 text-center shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc1_2"
                                                                value="<?php echo $row['cc1_2'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 text-center shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc1_3"
                                                                value="<?php echo $row['cc1_3'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 text-center shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc2_1"
                                                                value="<?php echo $row['cc2_1'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc2_2"
                                                                value="<?php echo $row['cc2_2'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc3_1"
                                                                value="<?php echo $row['cc3_1'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="cc3_2"
                                                                value="<?php echo $row['cc3_2'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="service"
                                                                value="<?php echo $row['service'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="training_name"
                                                                value="<?php echo $row['training_name'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="date" name="date"
                                                                value="<?php echo $row['date'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="training_venue"
                                                                value="<?php echo $row['training_venue'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="training_type"
                                                                value="<?php echo $row['training_type'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="fname"
                                                                value="<?php echo $row['fname'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="lname"
                                                                value="<?php echo $row['lname'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="sex"
                                                                value="<?php echo $row['sex'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="email" name="email"
                                                                value="<?php echo $row['email'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="contact_info"
                                                                value="<?php echo $row['contact_info'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="home_add"
                                                                value="<?php echo $row['home_add'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="age"
                                                                value="<?php echo $row['age'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="designation"
                                                                value="<?php echo $row['designation'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="company"
                                                                value="<?php echo $row['company'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="msme"
                                                                value="<?php echo $row['msme'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="customer_category"
                                                                value="<?php echo $row['customer_category'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="sector"
                                                                value="<?php echo $row['sector'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="returning_customer"
                                                                value="<?php echo $row['returning_customer'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mt-2">
                                                            <input type="number" name="sqd0"
                                                                value="<?php echo $row['sdq0'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd1"
                                                                value="<?php echo $row['sdq1'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd2"
                                                                value="<?php echo $row['sdq2'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd3"
                                                                value="<?php echo $row['sdq3'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd4"
                                                                value="<?php echo $row['sdq4'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd5"
                                                                value="<?php echo $row['sdq5'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd6"
                                                                value="<?php echo $row['sdq6'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd7"
                                                                value="<?php echo $row['sdq7'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sqd8"
                                                                value="<?php echo $row['sdq8'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="net_promoter"
                                                                value="<?php echo $row['net_promoter'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="ateneo"
                                                                value="<?php echo $row['ateneo'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="doa"
                                                                value="<?php echo $row['doa'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="dti"
                                                                value="<?php echo $row['dti'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="fda"
                                                                value="<?php echo $row['fda'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="sbc"
                                                                value="<?php echo $row['sbc'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="tesda"
                                                                value="<?php echo $row['tesda'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="uic"
                                                                value="<?php echo $row['uic'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="other_agency"
                                                                value="<?php echo $row['other_agency'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="number" name="other_agency_score"
                                                                value="<?php echo $row['other_agency_score'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="over_all_mood"
                                                                value="<?php echo $row['overall_mood'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mt-2">
                                                            <input type="text" name="comments"
                                                                value="<?php echo $row['comments'] ?>"
                                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <button type="submit" name="update"
                                                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mb-1 w-full">
                                                            Save
                                                        </button>

                                                        <a href="tables.php">
                                                            <button
                                                                class="rounded-md border px-3 py-2 text-sm font-semibold text-red-600 hover:bg-red-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 w-full">
                                                                Cancel
                                                            </button>
                                                        </a>
                                                    </td>

                                                </tr>




                                            </tbody>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/src/dashboard.js"></script>
</body>

</html>