<?php
require 'DBConn.php';

// Call the function to establish a database connection
$conn = connect_to_database();

if (isset ($_POST["submit"])) {
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
</head>

<body class="text-gray-800 font-inter">


  <?php include 'sidebar.php' ?>

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
                      <!-- start -->
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC1. Yes, aware before
                          my
                          transaction here</label>
                        <div class="mt-2">
                          <input type="number" name="cc1_1"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC1. Yes, but aware only
                          when
                          I saw the CC of this office</label>
                        <div class="mt-2">
                          <input type="number" name="cc1_2"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC1. No, not
                          aware</label>
                        <div class="mt-2">
                          <input type="number" name="cc1_3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC2. Yes, I saw the
                          Citizen's Charter</label>
                        <div class="mt-2">
                          <input type="number" name="cc2_1"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC2. No, I did not see
                          the Citizen's Charter</label>
                        <div class="mt-2">
                          <input type="number" name="cc2_2"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC3. Yes, I was able to
                          read</label>
                        <div class="mt-2">
                          <input type="number" name="cc3_1"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">CC3. No, I was not able
                          to
                          read</label>
                        <div class="mt-2">
                          <input type="number" name="cc3_2"
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

          <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md s  hadow-black/5">
            <div class="flex justify-between">
              <!-- diri isulod na div -->
              <div>
                <div class="text-2xl font-semibold mb-10">
                  Training Information
                </div>

                <!-- starting of input values -->
                <div class="flex items-center mb-4 order-tab">
                  <div class="">

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                      <!-- start -->

                      <!-- type of service -->
                      <div class="sm:col-span-3">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900 pt-8">Type of
                          Service</label>
                        <div class="mt-2">
                          <select id="" name="service"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="" selected hidden>Select Options</option>
                            <option value="Technology Intervention">Technology Intervention</option>
                            <option value="Technology Training">Technology Training</option>
                            <option value="Technology Forum/Seminar">Technology Forum/Seminar</option>
                            <option value="Consultancy Services">Consultancy Services</option>
                            <option value="Testing and Calibration">Testing and Calibration</option>
                            <option value="Packaging and Labeling Services">Packaging and Labeling Services</option>
                            <option value="Scholarship Program Services">Scholarship Program Services</option>
                            <option value="Formula and Conversion">Formula and Conversion</option>
                            <option value="R&D Management">R&D Management</option>
                          </select>
                        </div>
                      </div>

                      <!--  Training Title -->
                      <div class="sm:col-span-4">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900 pt-8">Training
                          Title</label>
                        <div class="mt-2">
                          <input type="text" name="training_name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-4">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                        <div class="mt-2">
                          <input id="" name="date" type="date"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Venue</label>
                        <div class="mt-2">
                          <input type="text" name="training_venue"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <!-- end -->
                    </div>

                    <div class="pt-5 space-y-5">
                      <label class="text-sm font-semibold leading-6 text-gray-900">
                        Training Type
                      </label>

                      <div class="pt-5 flex flex-wrap items-center gap-4">
                        <div class="flex items-center gap-x-3">
                          <input name="training_type" value="Food" type="radio"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Food</label>
                        </div>


                        <div class="flex items-center gap-x-3">
                          <input name="training_type" value="Non-food" type="radio"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Non-Food</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- next division here -->

          <!-- shape div -->
          <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between">


              <div> <!-- last na div sa all -->

                <div class="text-2xl font-semibold mb-1">
                  Personal Information
                </div>
                <div class="flex items-center mb-4 order-tab">
                  <div class="">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                        <div class="mt-2">
                          <input type="text" name="fname"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>



                      <div class="sm:col-span-2">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Last
                          Name</label>
                        <div class="mt-2">
                          <input type="text" name="lname"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-3">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
                        <div class="mt-2">
                          <select id="" name="sex"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="" selected hidden>Select Options</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>

                      <div class="sm:col-span-4">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Email
                          address</label>
                        <div class="mt-2">
                          <input id="" name="email" type="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-4">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Contact No.</label>
                        <div class="mt-2">
                          <input type="number" name="contact_info"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="col-span-full">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                          <input type="text" name="home_add"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-2 sm:col-start-1">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                        <div class="mt-2">
                          <input type="number" name="age"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-2">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Designation</label>
                        <div class="mt-2">
                          <input type="text" name="designation"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>

                      <div class="sm:col-span-2">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Company
                          Name</label>
                        <div class="mt-2">
                          <input type="text" name="company"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pt-5 space-y-5">
                  <label class="text-sm font-semibold leading-6 text-gray-900">
                    Is it your MSME or not?
                  </label>

                  <div class="pt-5 flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-x-3">
                      <input name="msme" value="Yes" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                      <label for="" class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                    </div>


                    <div class="flex items-center gap-x-3">
                      <input name="msme" value="No" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                      <label for="" class="block text-sm font-medium leading-6 text-gray-900">No</label>
                    </div>
                  </div>
                </div>


                <!-- Type of Customer -->
                <div class="flex items-center mb-4 order-tab">
                  <div class="pt-5">
                    <h1 class="text-base font-semibold leading-7 text-gray-900">
                      Mark your answers with a check (/)
                    </h1>

                    <div class="pt-5 space-y-5">

                      <label class="text-sm font-semibold leading-4 text-gray-900">
                        Are you a:
                      </label>

                      <div class="pt-5 flex flex-wrap items-center gap-4">
                        <div class="relative flex items-center gap-x-1">
                          <input name="customer_category[]" value="senior" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="font-medium text-gray-900">Senior Citizen</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="customer_category[]" value="disable" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="font-medium text-gray-900">Differently-Abled
                            Person</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="customer_category[]" value="4ps" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="font-medium text-gray-900">4Ps Member</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="customer_category[]" value="youth" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="font-medium text-gray-900">Youth(18-30yo)
                          </label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="customer_category[]" value="Ips" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="font-medium text-gray-900">Indigenous Group Member</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Type of Customer -->
                <div class="flex items-center mb-4 order-tab">
                  <div class="pt-5">

                    <div class="pt-5 space-y-5">

                      <label class="text-sm font-semibold leading-4 text-gray-900">
                        In What sector do you belong to?
                      </label>

                      <div class="pt-5 flex flex-wrap items-center gap-4">
                        <div class="relative flex items-center gap-x-1">
                          <input name="sector[]" value="industry" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="" class="font-medium text-gray-900">Industry</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="sector[]" value="Civil Society" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="civil-society" class="font-medium text-gray-900">Civil Society
                            Organization</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="sector[]" value="academe" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="academe" class="font-medium text-gray-900">Academe</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="secor[]" value="government" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="government" class="font-medium text-gray-900">Government</label>
                        </div>
                        <div class="relative flex items-center gap-x-3">
                          <input name="sector[]" value="media" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                          <label for="media" class="font-medium text-gray-900">Media</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- ftime-->
                <div class="pt-5 space-y-5">
                  <label class="text-sm font-semibold leading-6 text-gray-900">
                    Is it your FIRST TIME to avail of the DOST Assistance/Service?
                  </label>

                  <div class="pt-5 flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-x-3">
                      <input name="returning_customer" value="Yes" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                      <label for="" class="block text-sm font-medium leading-6 text-gray-900">Yes</label>
                    </div>


                    <div class="flex items-center gap-x-3">
                      <input name="returning_customer" value="No" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                      <label for="" class="block text-sm font-medium leading-6 text-gray-900">No</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- next division here -->


          <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between">
              <!-- diri isulod na div -->
              <div>
                <div class="text-2xl font-semibold mb-10">
                  1. How will you RATE the delivery of our assistance/service?
                </div>
                <fieldset>
                  <legend class="text-sm font-semibold leading-5 text-gray-900">
                    Legend
                  </legend>
                  <div class="pt-5 flex flex-wrap items-center gap-4">
                    <div class="relative flex items-center gap-x-1">
                      <label for="industry" class="font-medium text-gray-900">1-Strongly Disagree</label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="civil-society" class="font-medium text-gray-900">2-Disagree
                      </label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="academe" class="font-medium text-gray-900">3-Neither Agree nor Disagree</label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="government" class="font-medium text-gray-900">4-Agree
                      </label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="media" class="font-medium text-gray-900">5-Strongly Agree</label>
                    </div>
                  </div>
                </fieldset>
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD0. I am satisfied with the assistance / service
                            that I availed.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            Overall Perception of the Assistance/Service
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd0" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd0" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd0" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd0" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd0" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd0  -->


                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD1. I spent a reasonable amount of time for my transaction or the
                            availed assistance / service.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (The coordination timeline and transactional timeline are convenient and in accordance
                            to the Citizen’s Charter of DOST.)
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd1" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd1" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd1" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd1" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd1" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd1 -->


                <!-- start of sqd2 -->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD2. The office followed the transaction or the availed assistance /
                            service’s requirements and steps based on the information provided.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (Provided what was needed and what was promised in accordance with the policy and
                            standards and mutually agreed terms and conditions.)
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd2" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd2" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd2" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd2" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd2" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd2 -->

                <!-- start of sqd3-->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD3. The steps (including payment, if applicable) I needed to do for my
                            transaction or the availed assistance / service were easy and simple.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (Including convenience of location, ample amenities for comfortable transactions, use
                            of clear signages and modes of technology.)

                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd3" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd3" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd3" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd3" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd3" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd3 -->

                <!-- start of sqd4-->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD4. I easily found information about my transaction or the availed
                            assistance / service from the office or its website.

                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (Customers were informed in a language that can easily be understood and feedback
                            mechanisms were in place)
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd4" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd4" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd4" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd4" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd4" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd4 -->

                <!-- start of sqd5-->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD5. I paid a reasonable amount of fees for my transaction.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            - (Including the satisfaction on spending a reasonable counterpart amount for the
                            implementation of the assistance / service.)
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd5" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd5" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd5" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd5" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd5" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd5 -->

                <!-- start of sqd8-->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD8. I got what I needed from the government office, or (if denied) denial
                            of request was sufficiently explained to me.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (The extent of achieving outcomes or realizing the intended benefits of the government
                            assistance / service.)
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd8" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd8" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd8" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd8" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd8" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd8 -->

                <!-- start of sqd6-->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD6. I feel the office was fair to everyone, or “walang palakasan,” during
                            my transaction.

                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (The assurance that there is honesty, justice, fairness, and trust in the availed
                            assistance / service.)

                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd6" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd6" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd6" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd6" value="2" type="radio" <input id="push-email" name="push-notifications"
                        type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd6" value="1" type="radio" <input id="strongly-agree" name="push-notifications"
                        type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of sqd6 -->

                <!-- start of sqd7-->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            SQD7. I was treated courteously by the staff, and (if asked for help) the
                            staff was helpful.
                          </p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                            (The staff performed his/her duties, product / service knowledge, understand the
                            customer’s needs, and good working relationship.)
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="sqd7" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd7" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd7" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                        Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd7" value="2" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="sqd7" value="1" type="radio" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <div class="flex items-center gap-x-3">
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Strongly Disagree</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- next question -->

              </div>
            </div>
          </div>
          <!-- next division here -->


          <!-- Net Promoter Score Survey -->
          <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between">
              <!-- diri isulod na div -->
              <div>
                <div class="text-2xl font-semibold mb-1">
                  2. Net Promoter Score Survey
                </div>
                <fieldset>
                  <legend class="text-sm font-semibold leading-6 text-gray-900">
                    In what sector do you belong to?
                  </legend>
                  <div class="pt-5 flex flex-wrap items-center gap-4">
                    <div class="relative flex items-center gap-x-1">

                      <label for="media" class="font-medium text-gray-900">5-Highly Likely</label>
                    </div>
                    <div class="relative flex items-center gap-x-3">

                      <label for="government" class="font-medium text-gray-900">4-Likely
                      </label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="academe" class="font-medium text-gray-900">3-- Neutral</label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="civil-society" class="font-medium text-gray-900">2- - Unlikely
                      </label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                      <label for="industry" class="font-medium text-gray-900">1-- Highly Unlikely</label>
                    </div>
                  </div>
                </fieldset>

                <!-- 2.1 -->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            2.1 How likely are you to recommend our
                            assistance/services to others?
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                      <input name="net_promoter" value="5" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                        Likely
                      </label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="net_promoter" value="4" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                        Likely</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="net_promoter" value="3" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                        Neutral</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="net_promoter" value="2" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                        Unlikely</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                      <input name="net_promoter" value="1" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                      <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                        Highly
                        Unlikely</label>
                    </div>
                  </div>

                </div>
                <!-- end of 2.1  -->

                <!-- start of 2.2  -->
                <div class="pt-8 pl-4">
                  <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                      <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900">
                            2.2 How likely are you to recommend to others
                            SIMILAR ASSISTANCE / SERVICE you have availed from
                            the following agencies/institutions? If did not
                            receive any similar assistance / service, please put
                            N/A.
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="flex">
                  <!-- Ateneo -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              Ateneo de Davao University
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>

                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="ateneo" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="ateneo" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="ateneo" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="ateneo" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="ateneo" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="ateneo" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>

                  </div>

                  <!-- Department of Agriculture -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              Department of Agriculture XI
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="doa" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="doa" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="doa" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="doa" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="doa" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="doa" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>

                  <!-- Department of Trade and Industry -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              Department of Trade and Industry XI
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="dti" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="dti" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="dti" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="dti" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="dti" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="dti" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex">

                  <!-- FDA -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              Food and Drug Administration
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="fda" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="fda" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="fda" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="fda" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="fda" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="fda" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>

                  <!-- Small Business Corportation -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              Small Business Corporation
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="sbc" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="sbc" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="sbc" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="sbc" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="sbc" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="sbc" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>

                  <!-- tesda -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              Tesda XI
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="tesda" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="tesda" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="tesda" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="tesda" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="tesda" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="tesda" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex">
                  <!-- UIC -->
                  <div class="pt-8 pl-4 flex-grow">
                    <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                          <div class="min-w-0 flex-auto">
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                              University of the Immaculate Conception
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="uic" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="uic" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="uic" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="uic" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="uic" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="uic" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>

                  <div class="pt-8 pl-4 flex-grow">
                    <div class="sm:col-span-2 sm:col-start-1">
                      <label for="" class="block text-sm font-medium leading-6 text-gray-900">Others</label>
                      <div class="mt-2">
                        <input type="text" name="other_agency"
                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                      </div>
                    </div>
                    <div class="pl-4">
                      <div class="flex items-center gap-x-3">
                        <input name="other_agency_score" value="0" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">0 -
                          N/A</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="other_agency_score" value="5" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Highly
                          Likely
                        </label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="other_agency_score" value="4" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                          Likely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="other_agency_score" value="3" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 -
                          Neutral</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="other_agency_score" value="2" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                          Unlikely</label>
                      </div>
                      <div class="flex items-center gap-x-3">
                        <input name="other_agency_score" value="1" type="radio"
                          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                          Highly Unlikely</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of div -->
            </div>
          </div>

          <!-- next form  -->
          <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
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
                    <input name="overall_mood" value="Delighted" type="radio"
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

          <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between">
              <!-- diri isulod na div -->
              <div>
                <div class="text-2xl font-semibold mb-1">
                  4. We want to hear from you!
                </div>

                <legend class="text-sm font-semibold leading-6 text-gray-900">
                  What are your suggestions to improve our assistance/service?
                  Or are there noteworthy observations that you would like to
                  share?
                </legend>
                <div class="mt-2">
                  <textarea name="comments" rows="3"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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
