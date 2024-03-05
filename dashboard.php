<?php
include 'DBconn.php';
$conn = connect_to_database();

$sql_male = "SELECT COUNT(*) AS male_count FROM data WHERE sex = 'male'";
$result_male = $conn->query($sql_male);
$row_male = $result_male->fetch_assoc();
$male_count = $row_male["male_count"];

$sql_female = "SELECT COUNT(*) AS female_count FROM data WHERE sex = 'female'";
$result_female = $conn->query($sql_female);
$row_female = $result_female->fetch_assoc();
$female_count = $row_female["female_count"];

$sql_total = "SELECT COUNT(*) AS total_recipients FROM data";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_count = $row_total["total_recipients"];

$sql_tperSec = "SELECT  sector, COUNT(*) AS total_respondents  FROM data GROUP BY service, sector";
$result_tperSec = $conn->query($sql_tperSec);


$sql_tperSer = "SELECT service, COUNT(*) AS total_respondents 
        FROM data
        GROUP BY service";
$result_tperSer = $conn->query($sql_tperSer);

$sql_training = "SELECT training_name, COUNT(*) AS total_recipients 
FROM data
GROUP BY training_name";

$result_training = $conn->query($sql_training);
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
  <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
      <img src="./assets/1.png" alt="" class="w-8 h-8 rounded object-cover" />
      <span class="text-lg font-bold text-white ml-3">DOST CSFS</span>
    </a>
    <ul class="mt-4">
      <li class="mb-1 group active">
        <a href="#"
          class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
          <i class="ri-home-2-line mr-3 text-lg"></i>
          <span class="text-sm">Dashboard</span>
        </a>
      </li>

      <li class="mb-1 group">
        <a href="forms.php"
          class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
          <i class="ri-survey-line mr-3 text-lg"></i>
          <span class="text-sm">Forms</span>
        </a>
      </li>

      <li class="mb-1 group">
        <a href="reports.php"
          class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
          <i class="ri-settings-2-line mr-3 text-lg"></i>
          <span class="text-sm">Reports</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
  <!-- end: Sidebar -->

  <!-- start: Main -->
  <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
      <button type="button" class="text-lg text-gray-600 sidebar-toggle">
        <i class="ri-menu-line"></i>
      </button>
      <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
          <a class="text-base text-black font-bold">Dashboard</a>
        </li>
      </ul>
      <ul class="ml-auto flex items-center">
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
    <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- TOTAL NUMBER CARDS -->
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
          <div class="text-2xl font-medium text-gray-400">TOTAL MALE</div>
          <div class="flex justify-between mb-6">
            <div>
              <div class="text-2xl font-semibold mb-1">
                <?php echo $male_count ?>
              </div>

            </div>
          </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
          <div class="flex justify-between mb-4">
            <div>
              <div class="text-2xl font-medium text-gray-400">
                TOTAL FEMALE
              </div>
              <div class="flex items-center mb-1">

                <div class="text-2xl font-semibold">
                  <?php echo $female_count ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
          <div class="flex justify-between mb-6">
            <div>
              <div class="text-2xl font-medium text-gray-400">
                TOTAL RECIPIENTS
              </div>
              <div class="text-2xl font-semibold mb-1">
                <?php echo $total_count ?>
              </div>
              <div class="text-sm font-medium">

                <table style="width: 100%;text-align:center">
                  <thead>
                    <tr>
                      <th>Sector</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Loop through the query results and display each row
                    while ($row = $result_tperSec->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row['sector'] . "</td>";
                      echo "<td>" . $row['total_respondents'] . "</td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>


              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- TOTAL NUMBER CARDS END-->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex justify-between mb-4 items-start">
            <div class="text-2xl font-medium text-gray-400">LIST OF CONDUCTED TRAININGS</div>
          </div>
          <div class="text-sm font-medium ">
            <table style="width: 100%; text-align:center">
              <thead>
                <tr>
                  <th>Training Name</th>
                  <th>Total Recipients</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Loop through the query results and display each row
                while ($row = $result_training->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['training_name'] . "</td>";
                  echo "<td>" . $row['total_recipients'] . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex justify-between mb-4 items-start">
            <div class="text-2xl font-medium text-gray-400">LIST OF DELIVERED SERVICES</div>

          </div>
          <div class="text-sm font-medium ">
            <table style="width: 100%; text-align:center">
              <thead>
                <tr>
                  <th>Service</th>
                  <th>Total Respondents</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Loop through the query results and display each row
                while ($row = $result_tperSer->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['service'] . "</td>";
                  echo "<td>" . $row['total_respondents'] . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- end: Main -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./src/dashboard.js"></script>
</body>

</html>