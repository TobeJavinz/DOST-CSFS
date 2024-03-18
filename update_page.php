<?php
require 'conn.php';

// Establish database connection
$conn = connect_to_database();

$ServiceID = "";
$cc1_1 = "";
$cc1_2 = "";
$cc1_3 = "";
$cc2_1 = "";
$cc2_2 = "";
$cc3_1 = "";
$cc3_2 = "";

$errormessage = "";
$successmessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset ($_GET["ServiceID"])) {
        header("location: /DOST-CSFS/tables.php");
        exit;
    }

    $ServiceID = $_GET["ServiceID"];

    $sql = "SELECT * FROM testing WHERE ServiceID=$ServiceID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /DOST-CSFS/tables.php");
        exit;
    }

    $cc1_1 = $row["cc1_1"];
    $cc1_2 = $row["cc1_2"];
    $cc1_3 = $row["cc1_3"];
    $cc2_1 = $row["cc2_1"];
    $cc2_2 = $row["cc2_2"];
    $cc3_1 = $row["cc3_1"];
    $cc3_2 = $row["cc3_2"];

} else {

    $ServiceID = $_POST["ServiceID"];
    $cc1_1 = $_POST["cc1_1"];
    $cc1_2 = $_POST["cc1_2"];
    $cc1_3 = $_POST["cc1_3"];
    $cc2_1 = $_POST["cc2_1"];
    $cc2_2 = $_POST["cc2_2"];
    $cc3_1 = $_POST["cc3_1"];
    $cc3_2 = $_POST["cc3_2"];

    do {
        if (empty ($cc1_1) || empty ($cc1_2) || empty ($cc1_3) || empty ($cc2_1) || empty ($cc2_2) || empty ($cc3_1) || empty ($cc3_2)) {
            $errormessage = "Required";
            break;
        }

        $sql = "UPDATE testing " .
            "SET cc1_1 = '$cc1_1', cc1_2 = '$cc1_2', cc1_3 = '$cc1_3', cc2_1 = '$cc2_1', cc2_2 = '$cc2_2', cc3_1 = '$cc3_1', cc3_2 = '$cc3_2' " .
            "WHERE ServiceID = $ServiceID";

        $result = $conn->query($sql);

        if (!$result) {
            $errormessage = "Invalid" . $conn->error;
            break;
        }

        $successmessage = "updated successfully";

        header("location: /DOST-CSFS/tables.php");
        exit;
    } while (false);
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
    <?php include 'sidebar.php' ?>
    <!-- end: Sidebar -->


    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a class="text-base text-black font-bold">Forms</a>
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
        <form method="post" action="" autocomplete="off">
            <div class="p-6">
                <div class="grid grid-cols-1 gap-6">

                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md s  hadow-black/5">
                        <div class="flex justify-between">
                            <!-- diri isulod na div -->
                            <div>
                                <div class="text-2xl font-semibold mb-10">
                                    Customer Satisfaction Measurement
                                    Citizen’s Charter
                                </div>

                                <!-- starting of input values -->
                                <div class="flex items-center mb-4 order-tab">
                                    <div class="">
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                            <input type="text" value="<?php echo $ServiceID; ?>" name="ServiceID">
                                            <!-- start -->
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC1. Yes,
                                                    aware before
                                                    my
                                                    transaction here</label>
                                                <div class="mt-2">
                                                    <input type="text" value="<?php echo $row['cc1_1'] ?>" name="cc1_1"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC1. Yes,
                                                    but aware only
                                                    when
                                                    I saw the CC of this office</label>
                                                <div class="mt-2">
                                                    <input type="number" name="cc1_2"
                                                        value="<?php echo $row['cc1_2'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC1. No,
                                                    not
                                                    aware</label>
                                                <div class="mt-2">
                                                    <input type="number" name="cc1_3"
                                                        value="<?php echo $row['cc1_3'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC2. Yes,
                                                    I saw the
                                                    Citizen's Charter</label>
                                                <div class="mt-2">
                                                    <input type="number" name="cc2_1"
                                                        value="<?php echo $row['cc2_1'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC2. No, I
                                                    did not see
                                                    the Citizen's Charter</label>
                                                <div class="mt-2">
                                                    <input type="number" name="cc2_2"
                                                        value="<?php echo $row['cc2_2'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC3. Yes,
                                                    I was able to
                                                    read</label>
                                                <div class="mt-2">
                                                    <input type="number" name="cc3_1"
                                                        value="<?php echo $row['cc3_1'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">CC3. No, I
                                                    was not able
                                                    to
                                                    read</label>
                                                <div class="mt-2">
                                                    <input type="number" name="cc3_2"
                                                        value="<?php echo $row['cc3_2'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>



                                            <!-- end -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- next division here -->

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                            Cancel
                        </button>
                        <button type="submit" name="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Submit
                        </button>



                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/src/dashboard.js"></script>
</body>

</html>