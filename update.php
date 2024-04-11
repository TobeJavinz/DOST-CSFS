<?php
require 'DBConn.php';
include "session_auth.php";
// Establish database connection
$conn = connect_to_database();

$ServiceID = "";


$errormessage = "";
$successmessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["ServiceID"])) {
        header("location: /DOST-CSFS/tables.php");
        exit;
    }

    $ServiceID = $_GET["ServiceID"];

    $sql = "SELECT * FROM data WHERE ServiceID=$ServiceID";
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
    $service = $row["service"];
    $training_name = $row["training_name"];
    $date = $row["date"];
    $training_venue = $row["training_venue"];
    $training_type = $row["training_type"];
    $fname = $row["fname"];
    $lname = $row["lname"];
    $sex = $row["sex"];
    $email = $row["email"];
    $contact_info = $row["contact_info"];
    $home_add = $row["home_add"];
    $age = $row["age"];
    $designation = $row["designation"];
    $company = $row["company"];
    $msme = $row["msme"];
    $customer_category = $row["customer_category"];
    $sector = $row["sector"];
    $returning_customer = $row["returning_customer"];
    $sqd0 = $row["sqd0"];
    $sqd1 = $row["sqd1"];
    $sqd2 = $row["sqd2"];
    $sqd3 = $row["sqd3"];
    $sqd4 = $row["sqd4"];
    $sqd5 = $row["sqd5"];
    $sqd6 = $row["sqd6"];
    $sqd7 = $row["sqd7"];
    $sqd8 = $row["sqd8"];
    $net_promoter = $row["net_promoter"];
    $ateneo = $row["ateneo"];
    $doa = $row["doa"];
    $dti = $row["dti"];
    $fda = $row["fda"];
    $sbc = $row["sbc"];
    $tesda = $row["tesda"];
    $uic = $row["uic"];
    $other_agency = $row["other_agency"];
    $other_agency_score = $row["other_agency_score"];
    $overall_mood = $row["overall_mood"];
    $comments = $row["comments"];
} else {

    $ServiceID = $_POST["ServiceID"];
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


    $customer_categorys = ""; //basta mao ning ilahi ang customertype mao tong naa sa database
    foreach ($customer_category as $row) {
        $customer_categorys .= $row . ",";
    }

    // Remove the last comma from the string
    $customer_categorys = rtrim($customer_categorys, ',');

    // customer_category
    $sectors = ""; //basta mao ning ilahi ang customertype mao tong naa sa database
    foreach ($sector as $row) {
        $sectors .= $row . ",";
    }

    // Remove the last comma from the string
    $sectors = rtrim($sectors, ',');

    do {


        $sql = "UPDATE data " .
            "SET cc1_1 = '$cc1_1', cc1_2 = '$cc1_2', cc1_3 = '$cc1_3', cc2_1 = '$cc2_1', cc2_2 = '$cc2_2', cc3_1 = '$cc3_1', cc3_2 = '$cc3_2', 
            service = '$service', training_name = '$training_name', date = '$date', training_venue = '$training_venue', training_type = '$training_type', 
            fname = '$fname', lname = '$lname', sex = '$sex', email = '$email', contact_info = '$contact_info', home_add = '$home_add', 
            age = '$age', designation = '$designation', company = '$company', msme = '$msme', customer_category = '$customer_categorys', 
            sector = '$sectors', returning_customer = '$returning_customer', sqd0 = '$sqd0', sqd1 = '$sqd1', sqd2 = '$sqd2', sqd3 = '$sqd3', 
            sqd4 = '$sqd4', sqd5 = '$sqd5', sqd6 = '$sqd6', sqd7 = '$sqd7', sqd8 = '$sqd8', net_promoter = '$net_promoter', 
            ateneo = '$ateneo', doa = '$doa', dti = '$dti', fda = '$fda', sbc = '$sbc', tesda = '$tesda', uic = '$uic', 
            other_agency = '$other_agency', other_agency_score = '$other_agency_score', overall_mood = '$overall_mood', comments = '$comments'" .
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
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <title>CSFS | EDIT</title>
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
                    <div class="">
                        <input type="hidden" value="<?php echo $row['ServiceID'] ?>" name="ServiceID"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 text-center" />
                    </div>

                    <div class="bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black">
                        <div class="text-3xl text-default font-bold mb-5">
                            Customer Satisfaction Measurement
                            Citizen’s Charter
                        </div>


                        <div class="flex items-center mb-4 px-6 order-tab">
                            <div class="">
                                <p class="text-sm text-gray-400 font-semibold mt-6"> The Citizen’s Charter is an
                                    official document
                                    that reflects the services of a government agency/office including its requirements,
                                    fees, and processing times among others.
                                </p>
                            </div>
                        </div>

                        <!-- cc1_1 -->
                        <hr class="mt-6">
                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xs font-bold text-gray-900">
                                CC1.1</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc1_1" min="0" max="5" value="<?php echo $row['cc1_1'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">Yes, but aware
                                    only when I
                                    saw the
                                    CC of this office</p>
                            </div>
                        </div>


                        <!-- cc1_2  -->
                        <hr class="mt-6">
                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xs font-bold text-gray-900">
                                CC1.2</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc1_2" min="0" max="5" value="<?php echo $row['cc1_2'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">Yes,
                                    but aware only
                                    when
                                    I saw the CC of this office</p>
                            </div>
                        </div>
                        <hr class="mt-6">


                        <!-- cc1_3 -->

                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xs font-bold text-gray-900">
                                CC1.3</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc1_3" min="0" max="5" value="<?php echo $row['cc1_3'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">No, not
                                    aware</p>
                            </div>
                        </div>
                        <hr class="mt-6">



                        <!-- cc2_1 -->

                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xs font-bold text-gray-900">
                                CC2.1</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc2_1" min="0" max="5" value="<?php echo $row['cc2_1'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">Yes, I
                                    saw the
                                    Citizen's Charter</p>
                            </div>
                        </div>
                        <hr class="mt-6">


                        <!-- cc2_2 -->
                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xs font-bold text-gray-900">
                                CC2.2</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc2_2" min="0" max="5" value="<?php echo $row['cc2_2'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">No, I
                                    did not see
                                    the Citizen's Charter</p>
                            </div>
                        </div>
                        <hr class="mt-6">


                        <!-- cc3_1 -->
                        <div class=" px-2 mt-2">
                            <label for="cc3_1" class="text-xs font-bold text-gray-900">
                                CC3.1</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc3_1" min="0" max="5" value="<?php echo $row['cc3_1'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">Yes, I
                                    was able to
                                    read</p>
                            </div>
                        </div>
                        <hr class="mt-6">

                        <!-- cc3_2 -->
                        <div class=" px-2 mt-2">
                            <label for="cc1_1" class="text-xs font-bold text-gray-900">
                                CC3.2</label>
                        </div>
                        <div class="flex">
                            <div class="mt-2">
                                <input type="number" name="cc3_2" min="0" max="5" value="<?php echo $row['cc3_2'] ?>"
                                    class="block w-16 rounded-md py-1 text-sm  text-center ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                            </div>
                            <div>
                                <p class="py-2 ml-4 font-semibold">No, I
                                    was not able
                                    to
                                    read</p>
                            </div>
                        </div>
                        <hr class="mt-6">

                    </div>


                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                        <div class="flex justify-between">
                            <!-- diri isulod na div -->
                            <div>
                                <div class="text-3xl font-bold mb-5">
                                    Training Information
                                </div>

                                <!-- starting of input values -->
                                <div class="flex items-center mb-4 order-tab">
                                    <div class="">

                                        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                            <!-- type of service -->
                                            <div class="sm:col-span-3">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6  text-gray-900 pt-8">Type
                                                    of
                                                    Service</label>
                                                <div class="mt-2">
                                                    <select required id="" name="service"
                                                        class="block w-full rounded-custom border-0 px-4 py-2 pr-4 text-gray-900 outline-none shadow-sm ring-1 ring-inset ring-custom focus:ring-2 focus:ring-inset focus:ring-custom sm:max-w-xs sm:text-sm sm:leading-6">
                                                        <?php
                                                        // Assuming $services is an array of all possible services
                                                        $services = ['Technology Intervention', 'Technology Training', 'Technology Forum/Seminar', 'Consultancy Services', 'Testing and Calibration', 'Packaging and Labeling Services', 'Scholarship Program Services', 'Formula and Conversion', 'R&D Management'];

                                                        foreach ($services as $service) {
                                                            if ($service == $row['service']) {
                                                                echo "<option value=\"$service\" selected>$service</option>";
                                                            } else {
                                                                echo "<option value=\"$service\">$service</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <!--  Training Title -->
                                            <div class="sm:col-span-4">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Training
                                                    Title</label>
                                                <div class="mt-2">
                                                    <input type="text" name="training_name"
                                                        value="<?php echo $row['training_name'] ?>"
                                                        class="block w-full rounded-custom border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>

                                            <div class="m:col-span-2 sm:col-start-1"">
                                                <label for="" class=" block text-sm font-medium leading-6
                                                text-gray-900">Date</label>
                                                <div class="mt-2">
                                                    <input id="" name="date" type="date"
                                                        value="<?php echo date('Y-m-d', strtotime($row['date'])); ?>"
                                                        class="block w-full rounded-custom border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />


                                                </div>

                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for=""
                                                    class=" block text-sm font-medium leading-6 text-gray-900">Venue</label>
                                                <div class="mt-2">
                                                    <input type="text" name="training_venue"
                                                        value="<?php echo $row['training_venue'] ?>"
                                                        class="block w-full rounded-custom py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>

                                        <div class="pt-5">
                                            <label class="text-sm font-semibold leading-6 text-gray-900">
                                                Training Type
                                            </label>

                                            <div class="pt-2 flex flex-wrap items-center gap-4  ">
                                                <div class="flex items-center gap-x-3">
                                                    <input name="training_type" value="Food" type="radio" <?php if ($row['training_type'] == 'Food') {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 border-gray-300">
                                                    <label for=""
                                                        class="block text-sm  leading-6 text-gray-900">Food</label>
                                                </div>
                                                <div class="flex items-center gap-x-3">
                                                    <input name="training_type" value="Non-food" type="radio" <?php if ($row['training_type'] == 'Non-food') {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 border-gray-300 text-default focus:ring-custom">
                                                    <label for=""
                                                        class="block text-sm  leading-6 text-gray-900">Non-Food</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                        <div class="flex justify-between">
                            <div>
                                <div class="text-3xl font-bold mb-5">
                                    Personal Information
                                </div>

                                <div class="flex items-center mb-4 order-tab">
                                    <div class="">
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">First
                                                    Name</label>
                                                <div class="mt-2">
                                                    <input type="text" name="fname" value="<?php echo $row['fname'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Last
                                                    Name</label>
                                                <div class="mt-2">
                                                    <input type="text" name="lname" value="<?php echo $row['lname'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                                                <div class="mt-2">
                                                    <input type="number" name="age" value="<?php echo $row['age'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
                                                <div class="mt-2">
                                                    <select id="" name="sex"
                                                        class="block w-full rounded-md border-0 py-2 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6">
                                                        <?php
                                                        // Assuming $services is an array of all possible services
                                                        $sex = ['Male', 'Female'];

                                                        foreach ($sex as $sex) {
                                                            if ($sex == $row['sex']) {
                                                                echo "<option value=\"$sex\" selected>$sex</option>";
                                                            } else {
                                                                echo "<option value=\"$sex\">$sex</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                            </div>
                                            <div class="sm:col-span-4">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Email
                                                    address</label>
                                                <div class="mt-2">
                                                    <input id="" name="email" type="email"
                                                        value="<?php echo $row['email'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-4">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Contact
                                                    No.</label>
                                                <div class="mt-2">
                                                    <input type="number" name="contact_info"
                                                        value="<?php echo $row['contact_info'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="col-span-full">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                                                <div class="mt-2">
                                                    <input type="text" name="home_add"
                                                        value="<?php echo $row['home_add'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:col-start-1">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Designation</label>
                                                <div class="mt-2">
                                                    <input type="text" name="designation"
                                                        value="<?php echo $row['designation'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for=""
                                                    class="block text-sm font-medium leading-6 text-gray-900">Company
                                                    Name</label>
                                                <div class="mt-2">
                                                    <input type="text" name="company"
                                                        value="<?php echo $row['company'] ?>"
                                                        class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Type of Customer -->
                                <div class="flex items-center mb-4 order-tab">
                                    <div class="">

                                        <div class="pt-5 space-y-5">
                                            <label class="text-sm font-semibold leading-6 text-gray-900">
                                                Is it your MSME or not?
                                            </label>

                                            <div class=" flex flex-wrap items-center gap-4">
                                                <div class="flex items-center gap-x-3">
                                                    <input name="msme" value="Yes" type="radio" <?php if ($row['msme'] == 'Yes') {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for=""
                                                        class="block text-sm  leading-6 text-gray-900">Yes</label>
                                                </div>


                                                <div class="flex items-center gap-x-3">
                                                    <input name="msme" value="No" type="radio" <?php if ($row['msme'] == 'No') {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for=""
                                                        class="block text-sm leading-6 text-gray-900">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-8 space-y-5">

                                            <label class=" leading-4 font-semibold text-gray-900">
                                                Are you a:
                                            </label>
                                            <?php
                                            $categories = explode(',', $row['customer_category']);
                                            ?>

                                            <div class=" flex flex-wrap items-center gap-4">
                                                <div class="relative flex items-center gap-x-1">
                                                    <input name="customer_category[]" value="SC" type="checkbox" <?php if (in_array('SC', $categories)) {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 rounded border-gray-300">
                                                    <label for="" class=" text-gray-900">Senior Citizen</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="customer_category[]" value="Differently-Abled"
                                                        type="checkbox" <?php if (in_array('Differently-Abled', $categories)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="" class=" text-gray-900">Differently-Abled
                                                        Person</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="customer_category[]" value="4Ps Member" type="checkbox"
                                                        <?php if (in_array('4Ps Member', $categories)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="" class=" text-gray-900">4Ps Member</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="customer_category[]" value="youth" type="checkbox"
                                                        <?php if (in_array('youth', $categories)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="" class=" text-gray-900">Youth(18-30yo)
                                                    </label>
                                                </div>
                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="customer_category[]" value="IP Group Member"
                                                        type="checkbox" <?php if (in_array('IP Group Member', $categories)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="" class=" text-gray-900">Indigenous Group Member</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="customer_category[]" value="N/A" type="checkbox" 
                                                    <?php if (in_array('N/A', $categories)) { echo "checked"; } ?> 
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="" class="text-gray-900">N/A</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Type of Customer -->
                                <div class="flex items-center mb-4 order-tab">
                                    <div class="pt-8">

                                        <div class="space-y-5">

                                            <label class="text-m font-semibold leading-4 text-gray-900">
                                                In What sector do you belong to?
                                            </label>

                                            <?php
                                            $sectors = explode(',', $row['sector']);
                                            ?>

                                            <div class=" flex flex-wrap items-center gap-4">
                                                <div class="relative flex items-center gap-x-1">
                                                    <input name="sector[]" value="industry" type="checkbox" <?php if (in_array('industry', $sectors)) {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="" class=" text-gray-900">Industry</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="sector[]" value="cso" type="checkbox" <?php if (in_array('cso', $sectors)) {
                                                        echo "checked";
                                                    } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="civil-society" class=" text-gray-900">Civil Society
                                                        Organization</label>
                                                </div>
                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="sector[]" value="academe" type="checkbox" <input
                                                        name="sector[]" value="cso" type="checkbox" <?php if (in_array('academe', $sectors)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="academe" class=" text-gray-900">Academe</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="sector[]" value="government" type="checkbox" <input
                                                        name="sector[]" value="cso" type="checkbox" <?php if (in_array('government', $sectors)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="government" class=" text-gray-900">Government</label>
                                                </div>
                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="sector[]" value="media" type="checkbox" <input
                                                        name="sector[]" value="cso" type="checkbox" <?php if (in_array('media', $sectors)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="media" class=" text-gray-900">Media</label>
                                                </div>

                                                <div class="relative flex items-center gap-x-3">
                                                    <input name="sector[]" value="media" type="checkbox" <input
                                                        name="sector[]" value="cso" type="checkbox" <?php if (in_array('N/A', $sectors)) {
                                                            echo "checked";
                                                        } ?>
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                    <label for="media" class=" text-gray-900">N/A</label>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ftime-->
                                <div class=" pt-8 space-y-5">
                                    <label class="text-sm font-semibold leading-6 text-gray-900">
                                        Is it your FIRST TIME to avail of the DOST Assistance/Service?
                                    </label>

                                    <div class="flex flex-wrap items-center gap-4">
                                        <div class="flex items-center gap-x-3">
                                            <input name="returning_customer" value="Yes" type="radio" <?php if ($row['returning_customer'] == 'Yes') {
                                                echo "checked";
                                            } ?>
                                                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            <label for="" class="block text-sm  leading-6 text-gray-900">Yes</label>
                                        </div>


                                        <div class="flex items-center gap-x-3">
                                            <input name="returning_customer" value="No" type="radio" <?php if ($row['returning_customer'] == 'No') {
                                                echo "checked";
                                            } ?>
                                                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            <label for="" class="block text-sm  leading-6 text-gray-900">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- next division here -->
                    <?php include 'sqdupdate.php' ?>

                    <!-- Net Promoter Score Survey -->
                    <?php include 'netpromoterupdate.php' ?>
                    <!--  -->

                    <!-- next form  -->
                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                        <div class="flex justify-between">
                            <!-- diri isulod na div -->
                            <div>
                                <div class="text-2xl font-semibold mb-1">
                                    3. What is your OVERALL MOOD/FEELING best describes your
                                    experience with us?
                                </div>
                                <legend class="text-sm font-semibold leading-6 text-gray-900">
                                    Please check the appropriate box
                                </legend>
                                <div class="pt-5 flex flex-wrap items-center gap-4">
                                    <div class="flex items-center gap-x-3">
                                        <input name="overall_mood" value="Delighted" type="radio" <?php if ($row['overall_mood'] == 'Delighted') {
                                            echo "checked";
                                        } ?>
                                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Delighted
                                        </label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input name="overall_mood" value="Satisfied" type="radio" <?php if ($row['overall_mood'] == 'Satisfied') {
                                            echo "checked";
                                        } ?>
                                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Satisfied
                                        </label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input name="overall_mood" value="Neutral" type="radio" <?php if ($row['overall_mood'] == 'Neutral') {
                                            echo "checked";
                                        } ?>
                                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Neutral</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input name="overall_mood" value="Unsatisfied" type="radio" <?php if ($row['overall_mood'] == 'Unsatisfied') {
                                            echo "checked";
                                        } ?>
                                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                        <label
                                            class="block text-sm font-medium leading-6 text-gray-900">Unsatisfied</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input name="overall_mood" value="Disappointed" type="radio" <?php if ($row['overall_mood'] == 'Disappointed') {
                                            echo "checked";
                                        } ?>
                                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Disappointed
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- comments  -->
                    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                        <div class="flex justify-between">
                            <!-- diri isulod na div -->
                            <div>
                                <div class="text-2xl font-semibold mb-1">
                                    4. We want to hear from you!
                                </div>

                                <legend class="text-sm font-semibold leading-6 text-gray-900">
                                    What are your suggestions to improve our assistance/service?
                                    Or are there noteworthy observations that you would like to
                                    share? <br> Or you rated 3 below in the SQDs.
                                </legend>
                                <div class="mt-2">
                                    <textarea name="comments" rows="3" value=""
                                        class="block w-full rounded-md border-0 py-1.5  text-gray-900 shadow-sm ring-1 ring-custom input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 "> <?php echo $row['comments'] ?></textarea>
                                </div>

                            </div>
                            <!-- end of div -->
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">

                        <button type="button"
                            class="rounded-md border border-red-500 px-3 py-2 text-sm text-red-500 font-semibold hover:bg-red-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                            onclick="window.location.href = 'tables.php'">
                            Cancel
                        </button>
                        <button type="submit" name="submit"
                            class="rounded-md bg-custom px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </main>
    <!-- end: Main -->

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./src/dashboard.js"></script>
</body>

</html>