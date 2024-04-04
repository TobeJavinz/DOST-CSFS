<?php
include 'session_auth.php';
require 'DBConn.php';

// Call the function to establish a database connection
$conn = connect_to_database();

if (isset($_POST["submit"])) {
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




    // customer_category
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

    // Fix the query to use $customertypes instead of $customertype
    $query = "INSERT INTO data VALUES('', '$cc1_1', '$cc1_2', '$cc1_3', '$cc2_1', '$cc2_2', '$cc3_1', '$cc3_2','$service', '$training_name', '$date', '$training_venue', '$training_type','$fname', '$lname', '$sex', '$email', '$contact_info', '$home_add', '$age', '$designation', '$company', '$msme', '$customer_categorys', '$sectors', '$returning_customer', '$sqd0', '$sqd1', '$sqd2', '$sqd3', '$sqd4', '$sqd5', '$sqd6', '$sqd7', '$sqd8', '$net_promoter', '$ateneo', '$doa', '$dti', '$fda', '$sbc', '$tesda', '$uic', '$other_agency', '$other_agency_score', '$overall_mood', '$comments')";

    // Execute the query using the database connection object
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Data Inserted Successfully'); </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
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
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <title>CSF FORM</title>

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
            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle" />
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
              <a href="session_destroy.php"
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

                    <!-- Start of CC  -->
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
                                <input type="number" name="cc1_1" pattern="[1-5]"
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
                                <input type="number" name="cc1_2" pattern="[1-5]"
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
                                <input type="number" name="cc1_3" pattern="[1-5]"
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
                                <input type="number" name="cc2_1" pattern="[1-5]"
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
                                <input type="number" name="cc2_2" pattern="[1-5]"
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
                                <input type="number" name="cc3_1" pattern="[1-5]"
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
                                <input type="number" name="cc3_2" pattern="[1-5]"
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
                </div>

                <!-- END of CC  -->

                <!-- Start of Training Information -->

                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                    <div class="flex justify-between">
                        <!-- diri isulod na div -->
                        <div>
                            <div class="text-3xl text-default font-bold mb-5">
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
                                                <select id="" name="service"
                                                    class="block w-full rounded-md border-0 px-4 py-2 pr-4 text-gray-900 outline-none shadow-sm ring-1 ring-inset ring-gray focus:ring-2 focus:ring-inset focus:ring-custom sm:max-w-xs sm:text-sm sm:leading-6">
                                                <select required id="" name="service"
                                                    class="block w-full rounded-custom border-0 px-4 py-2 pr-4 text-gray-900 outline-none shadow-sm ring-1 ring-inset ring-gray focus:ring-2 focus:ring-inset focus:ring-custom sm:max-w-xs sm:text-sm sm:leading-6">
                                                    <option value="" selected hidden>Select Options</option>
                                                    <option value="Technology Intervention">Technology Intervention
                                                    </option>
                                                    <option value="Technology Training">Technology Training</option>
                                                    <option value="Technology Forum/Seminar">Technology
                                                        Forum/Seminar</option>
                                                    <option value="Consultancy Services">Consultancy Services
                                                    </option>
                                                    <option value="Testing and Calibration">Testing and Calibration
                                                    </option>
                                                    <option value="Packaging and Labeling Services">Packaging and
                                                        Labeling Services</option>
                                                    <option value="Scholarship Program Services">Scholarship Program
                                                        Services</option>
                                                    <option value="Formula and Conversion">Formula and Conversion
                                                    </option>
                                                    <option value="R&D Management">R&D Management</option>
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
                                                    class="block w-full rounded-md border-0 py-1.5 px-4  text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>

                                        <div class="m:col-span-2 sm:col-start-1"">
                                                <label for="" class=" block text-sm font-medium leading-6
                                            text-gray-900">Date</label>
                                            <div class="mt-2">
                                                <input id="" name="date" type="date"
                                                    class="block w-full rounded-md px-4 py-1 text-center text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3 pl-4">
                                            <label for=""
                                                class=" block text-sm font-medium leading-6 text-gray-900">Venue</label>
                                            <div class="mt-2">
                                                <input type="text" name="training_venue"
                                                    class="block w-full rounded-md py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
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
                                                <input required  name="training_type" value="Food" type="radio"
                                                    class="h-4 w-4 border-gray-300 ">
                                                <label for=""
                                                    class="block text-sm  leading-6 text-gray-900">Food</label>
                                            </div>
                                            <div class="flex items-center gap-x-3">
                                                <input name="training_type" value="Non-food" type="radio"
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
                <!-- next division here -->

                <!-- Personal Information -->
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                    <div class="flex justify-between">
                        <div>
                            <div class="text-3xl text-default font-bold mb-5">
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
                                                <input type="text" name="fname"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Last
                                                Name</label>
                                            <div class="mt-2">
                                                <input type="text" name="lname"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2 sm:col-start-1">
                                            <label for=""
                                                class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                                            <div class="mt-2">
                                                <input type="number" name="age"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for=""
                                                class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
                                            <div class="mt-2">
                                                <select required id="" name="sex"
                                                    class="block w-full rounded-md border-0 py-2 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6">
                                                    <option value="" selected hidden>Select Options</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
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
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label for=""
                                                class="block text-sm font-medium leading-6 text-gray-900">Contact
                                                No.</label>
                                            <div class="mt-2">
                                                <input type="number" name="contact_info"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>
                                        <div class="col-span-full">
                                            <label for=""
                                                class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                                            <div class="mt-2">
                                                <input type="text" name="home_add"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2 sm:col-start-1">
                                            <label for=""
                                                class="block text-sm font-medium leading-6 text-gray-900">Designation</label>
                                            <div class="mt-2">
                                                <input required type="text" name="designation"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for=""
                                                class="block text-sm font-medium leading-6 text-gray-900">Company
                                                Name</label>
                                            <div class="mt-2">
                                                <input required type="text" name="company"
                                                    class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6" />
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
                                                <input required name="msme" value="Yes" type="radio"
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class="block text-sm  leading-6 text-gray-900">Yes</label>
                                            </div>


                                            <div class="flex items-center gap-x-3">
                                                <input name="msme" value="No" type="radio"
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class="block text-sm leading-6 text-gray-900">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-8 space-y-5">

                                        <label class=" leading-4 font-semibold text-gray-900">
                                            Are you a:
                                        </label>
                                        <div class=" flex flex-wrap items-center gap-4">
                                            <div class="relative flex items-center gap-x-1">
                                                <input required name="customer_category[]" value="SC" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 ">
                                                <label for="" class=" text-gray-900">Senior Citizen</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="customer_category[]" value="disable" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class=" text-gray-900">Differently-Abled
                                                    Person</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="customer_category[]" value="4ps" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class=" text-gray-900">4Ps Member</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="customer_category[]" value="youth" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class=" text-gray-900">Youth(18-30yo)
                                                </label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="customer_category[]" value="Ips" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class=" text-gray-900">Indigenous Group Member</label>
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

                                        <div class=" flex flex-wrap items-center gap-4">
                                            <div class="relative flex items-center gap-x-1">
                                                <input required name="sector[]" value="industry" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="" class=" text-gray-900">Industry</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="sector[]" value="Civil Society" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="civil-society" class=" text-gray-900">Civil Society
                                                    Organization</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="sector[]" value="academe" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="academe" class=" text-gray-900">Academe</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="sector[]" value="government" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="government" class=" text-gray-900">Government</label>
                                            </div>
                                            <div class="relative flex items-center gap-x-3">
                                                <input name="sector[]" value="media" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="media" class=" text-gray-900">Media</label>
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
                                        <input required name="returning_customer" value="Yes" type="radio"
                                            class="h-4 w-4 border-gray-300 text-default focus:ring-custom">
                                        <label for="" class="block text-sm  leading-6 text-gray-900">Yes</label>
                                    </div>


                                    <div class="flex items-center gap-x-3">
                                        <input name="returning_customer" value="No" type="radio"
                                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="" class="block text-sm  leading-6 text-gray-900">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- next division here -->
                <?php include 'sqd.php' ?>

                <!-- Net Promoter Score Survey -->
                <?php include 'netpromoter.php' ?>

                <!-- next form  -->
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
                    <div class="flex justify-between">
                        <!-- diri isulod na div -->
                        <div>
                            <div class="text-3xl text-default font-bold mb-6">
                                3. What is your OVERALL MOOD/FEELING best describes your
                                experience with us?
                            </div>
                            <legend class="text-sm font-semibold leading-6 text-gray-900">
                                Please check the appropriate box
                            </legend>
                            <div class="pt-5 flex flex-wrap items-center gap-4">
                                <div class="flex items-center gap-x-3">
                                    <input checked  name="overall_mood" value="Delighted" type="radio"
                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Delighted
                                    </label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input name="overall_mood" value="Satisfied" type="radio"
                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Satisfied
                                    </label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input name="overall_mood" value="Neutral" type="radio"
                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Neutral</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input name="overall_mood" value="Unsatisfied" type="radio"
                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Unsatisfied</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input name="overall_mood" value="Disappointed" type="radio"
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
                            <div class="text-3xl text-default font-bold mb-6">
                                4. We want to hear from you!
                            </div>

                            <legend class="text-sm font-semibold leading-6 text-gray-900">
                                What are your suggestions to improve our assistance/service?
                                Or are there noteworthy observations that you would like to
                                share?
                            </legend>
                            <div class="mt-2">
                                <textarea name="comments" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 px-2  text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 "> </textarea>
                            </div>

                        </div>
                        <!-- end of div -->
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                        Cancel
                    </button>
                    <button type="submit" name="submit"
                        class="rounded-md bg-custom px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Submit
                    </button>
                </div>
            </div>
        </form>

    </main>
    <!-- end: Main -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./src/script.js"></script>
</body>

</html>
