<?php

include 'session_auth.php';



include 'DBConn.php';
$conn = connect_to_database();
// get no. male
$sql_male = "SELECT COUNT(*) AS male_count FROM data WHERE sex = 'male'";
$result_male = $conn->query($sql_male);
$row_male = $result_male->fetch_assoc();
$male_count = $row_male["male_count"];
// no. female
$sql_female = "SELECT COUNT(*) AS female_count FROM data WHERE sex = 'female'";
$result_female = $conn->query($sql_female);
$row_female = $result_female->fetch_assoc();
$female_count = $row_female["female_count"];
// total no. recipient
$sql_total = "SELECT COUNT(*) AS total_recipients FROM data";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_count = $row_total["total_recipients"];
// number of recipient per sector
$sql_tperSec = "SELECT sector, COUNT(*) AS total_respondents FROM data GROUP BY sector";
$result_tperSec = $conn->query($sql_tperSec);
// total services
$sql_tperSer = "SELECT service, COUNT(*) AS total_respondents FROM data GROUP BY service";
$result_tperSer = $conn->query($sql_tperSer);
// total trainings
$sql_training = "SELECT training_name, COUNT(*) AS total_recipients 
FROM data
GROUP BY training_name";
$result_training = $conn->query($sql_training);
// returning
$sql_returning = "SELECT COUNT(*) AS yes_count FROM data WHERE returning_customer = 'yes'; ";
$result_returning = $conn->query($sql_returning);
$row_returning = $result_returning->fetch_assoc();
$total_returning = $row_returning["yes_count"];
// firsttime
$sql_firsttime = "SELECT COUNT(*) AS yes_count FROM data WHERE returning_customer = 'no'; ";
$result_firsttime = $conn->query($sql_firsttime);
$row_firsttime = $result_firsttime->fetch_assoc();
$total_firsttime = $row_firsttime["yes_count"];

// MSME count
$sql_msme = "SELECT COUNT(*) AS msme_count FROM data WHERE msme = 'yes'; ";
$result_msme = $conn->query($sql_msme);
$row_msme = $result_msme->fetch_assoc();
$total_msme = $row_msme["msme_count"];
// non-food trainings

$sql_nonfood = "SELECT COUNT(*) AS nonfood_count FROM data WHERE training_type = 'non-food'; ";
$result_nonfood = $conn->query($sql_nonfood);
$row_nonfood = $result_nonfood->fetch_assoc();
$total_nonfood = $row_nonfood["nonfood_count"];

// food trainings
$sql_food = "SELECT COUNT(*) AS food_count FROM data WHERE training_type = 'food'; ";
$result_food = $conn->query($sql_food);
$row_food = $result_food->fetch_assoc();
$total_food = $row_food["food_count"];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="./src/output.css" rel="stylesheet" />
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <title>DASHBOARD</title>

</head>

<body class="text-gray-800 font-inter">
  <!-- start: Sidebar -->

  <?php include 'sidebar.php' ?>
  <!-- end: Sidebar -->

  <!-- start: Main -->
  <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

    <?php
    $headerText = "Dashboard";
    include 'header.php';
    ?>

    <div class="pl-custom mr-4 mt-4 mb-3">
      <div class="grid grid-cols-1 ">
        <div class="bg-white border border-black shadow-md shadow-black/5 rounded-md">

          <div class="pl-custom mr-4 mt-4 mb-3">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      emoji_people
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">First Time Clients</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $total_firsttime ?>
                </div>
              </div>

              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      accessibility_new
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Returning Clients</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $total_returning ?>
                </div>
              </div>

              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      man
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Total Male</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $male_count ?>
                </div>
              </div>

              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      woman
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Total Female</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $female_count ?>
                </div>
              </div>


            </div>

          </div>
          <div class="pl-custom mr-4 mb-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      <span class="material-symbols-outlined">
                        groups
                      </span>
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Total Clients</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $total_count ?>
                </div>
              </div>

              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      enterprise
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Number of MSMEs</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $total_msme ?>
                </div>
              </div>

              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      Apparel
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Non-Food Trainings</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $total_nonfood ?>
                </div>
              </div>

              <div class="bg-customs border justify-between border-black shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex">
                  <div
                    class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

                    <span class="material-symbols-outlined text-white">
                      local_dining
                    </span>

                  </div>
                  <div class="text-md font-bold text-black py-2 ml-4">Food Trainings</div>

                </div>
                <div class="text-xxl font-semibold text-black py-1  text-center">
                  <?php echo $total_food ?>
                </div>
              </div>


            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="pl-custom mr-4 mt-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white border border-black shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex">
            <div class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

              <span class="material-symbols-outlined text-white">
                task_alt
              </span>

            </div>
            <div class="text-lg font-bold text-black py-2 ml-4">CONDUCTED TRAINING</div>
          </div>
          <!-- LIST OF CONDUCTED TRAININGS table -->
          <div class="flex justify-center mt-2">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="bg-white">
                      <tr>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Loop through the query results and display each row
                      $counter = 1;
                      while ($row = $result_training->fetch_assoc()) {
                        echo "<tr class='" . ($counter % 2 == 0 ? "bg-gray-100" : "bg-white") . "'>";
                        // echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $counter . "</td>";
                        echo "<td class='text-sm text-gray-900 font-light  py-4 whitespace-nowrap'>" . $row['training_name'] . "</td>";
                        echo "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>" . $row['total_recipients'] . "</td>";
                        echo "</tr>";
                        $counter++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white border border-black shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex">
            <div class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">
              <span class="material-symbols-outlined text-white ">
                home_work
              </span>
            </div>
            <div class="text-lg font-bold text-black py-2 ml-4">FIRMS ASSISTED</div>
          </div>


          <!--Firsm Assisted table -->
          <div class="flex justify-center mt-2">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 text-left">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="bg-white ">
                      <tr>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Assuming $conn is your database connection
                      
                      // Execute the query
                      $Firms_query = "SELECT DISTINCT `company` AS Services, COUNT(*) AS Total FROM `data` GROUP BY `company`";
                      $Firms_result = $conn->query($Firms_query);

                      // Loop through the query results and display each row
                      $index = 1; // For numbering each row
                      while ($row = $Firms_result->fetch_assoc()) {
                        echo "<tr class='" . (($index % 2 == 0) ? "bg-gray-100" : "bg-white") . "'>";

                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . ucwords($row['Services']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $index . "</td>";

                        echo "</tr>";
                        $index++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white border border-black shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex">
            <div class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">

              <span class="material-symbols-outlined text-white">
                support_agent
              </span>

            </div>
            <div class="text-lg font-bold text-black py-2 ml-4">DELIVERED SERVICE</div>
          </div>
          <!--DELIVERED SERVICES table -->
          <div class="flex justify-center mt-2">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="bg-white">
                      <tr>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Loop through the query results and display each row
                      $index = 1; // For numbering each row
                      while ($row = $result_tperSer->fetch_assoc()) {
                        echo "<tr class='" . (($index % 2 == 0) ? "bg-gray-100" : "bg-white") . "'>";
                        // echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $index . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $row['service'] . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $row['total_respondents'] . "</td>";
                        echo "</tr>";
                        $index++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="bg-white border border-black shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex">
            <div class="flex h-11 w-11  items-center justify-center rounded-full bg-custom sm:mx-0 sm:h-10 sm:w-10">
              <span class="material-symbols-outlined text-white ">
                home_work
              </span>
            </div>
            <div class="text-lg font-bold text-black py-2 ml-4">DIFFERENT SECTORS</div>
          </div>


          <!--Different Sectors -->
          <div class="flex justify-center mt-2"> <!-- Added flex and justify-center classes -->
            <div class="flex flex-col">
              <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5"> <!-- Removed text-center class -->
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table class="min-w-full">
                      <thead class="bg-white">
                        <tr>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Loop through the query results and display each row
                        $count = 1;
                        while ($row = $result_tperSec->fetch_assoc()) {
                          echo "<tr class='" . (($count % 2 == 0) ? "bg-gray-100" : "bg-white") . "'>";
                          // echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $count . "</td>";
                          echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . ucwords($row['sector']) . "</td>";
                          echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-light'>" . $row['total_respondents'] . "</td>";
                          echo "</tr>";
                          $count++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
  <!-- end: Main -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./src/script.js"></script>
</body>

</html>



<!-- and in the death of her REPUTATION, she felt truly alive... -->