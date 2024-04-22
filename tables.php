<?php

include "session_auth.php";
require 'DBConn.php';

// Establish database connection
$conn = connect_to_database();

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$num_per_page = 9;
$start_from = ($page - 1) * $num_per_page;



// Perform a query
if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($conn, $_GET['search']);
  $query = "SELECT * FROM data WHERE CONCAT(ServiceID, training_name, date, fname, lname) LIKE '%$search%'";
} else {
  $start_from = ($page - 1) * $num_per_page; // Assuming $page and $num_per_page are defined elsewhere
  $query = "SELECT * FROM data LIMIT $start_from, $num_per_page";
}
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="./src/output.css" rel="stylesheet" />
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <title>CSFS | RESPONSES</title>
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
    <div class="p-6">
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">

        <div class="md:px-32 py-8 w-full">


          <div class="flex items-center justify-between mb-6">
            <!-- Modal -->

            <h1 class="text-2xl font-bold text-gray-800">CSF Respondents</h1>
            <form method="GET">
              <div class="flex items-center py-2 rounded-md">
                <div class="flex">

                  <input type="text" name="search" required placeholder="&#x1F50D; Search" value="<?php if (isset($_GET['search'])) {
                    echo $_GET['search'];
                  } ?>"
                    class="block w-full rounded-custom border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 mr-2" />
                  <button type="submit"
                    class="rounded-md bg-custom px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Search
                  </button>

                </div>

              </div>
            </form>
          </div>








        </div>
      </div>
    </div>
    </div>


    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class="table-auto w-full bg-white mb-4">
        <thead class="bg-custom h-10 text-white >
                <tr class=" text-center">
          <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">
            Database No.
          </th>



          <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
            Training Name
          </th>
          <th class="  py-3 px-4 uppercase font-semibold text-sm text-center">
            Date
          </th>

          <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
            First Name
          </th>
          <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm text-center">
            Last Name
          </th>
          <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm text-center">
            Actions
          </th>
          </tr>
        </thead>
        <tbody class=" text-center text-gray-500 ">
          <?php
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $parts = explode(':', $search);

            if (count($parts) == 2) {
              list($column, $content) = $parts;

              $query = "SELECT `ServiceID`,`training_name`,`date`,`fname`,`lname`,`designation` FROM data WHERE `$column` LIKE '%$content%'";
            } else {
              $query = "SELECT `ServiceID`,`training_name`,`date`,`fname`,`lname`,`designation` FROM data WHERE 
`sex` LIKE '%$search%' OR 
`email` LIKE '%$search%' OR 
`contact_info` LIKE '%$search%' OR 
`home_add` LIKE '%$search%' OR 
`age` LIKE '%$search%' OR 
`designation` LIKE '%$search%' OR 
`company` LIKE '%$search%' OR 
`msme` LIKE '%$search%' OR 
`customer_category` LIKE '%$search%' OR 
`sector` LIKE '%$search%' OR 
`returning_customer` LIKE '%$search%' OR 
`sqd0` LIKE '%$search%' OR 
`sqd1` LIKE '%$search%' OR 
`sqd2` LIKE '%$search%' OR 
`sqd3` LIKE '%$search%' OR 
`sqd4` LIKE '%$search%' OR 
`sqd5` LIKE '%$search%' OR 
`sqd6` LIKE '%$search%' OR 
`sqd7` LIKE '%$search%' OR 
`sqd8` LIKE '%$search%' OR 
`net_promoter` LIKE '%$search%' OR 
`ateneo` LIKE '%$search%' OR 
`doa` LIKE '%$search%' OR 
`dti` LIKE '%$search%' OR 
`fda` LIKE '%$search%' OR 
`sbc` LIKE '%$search%' OR 
`tesda` LIKE '%$search%' OR 
`uic` LIKE '%$search%' OR 
`other_agency` LIKE '%$search%' OR 
`other_agency_score` LIKE '%$search%' OR 
`overall_mood` LIKE '%$search%' OR 
`comments` LIKE '%$search%'";
            }


            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {

              foreach ($query_run as $rows) {

                ?>
                <tr>
                  <td class="w-1/3 text-center text-sm py-3 px-4">
                    <?= $rows['ServiceID'] ?>
                  </td>
                  <td class="w-1/3 text-center text-sm py-3 px-4">
                    <?= $rows['training_name'] ?>
                  </td>
                  <td class="w-1/3 text-center text-sm py-3 px-4">
                    <?= $rows['date'] ?>
                  </td>
                  <td class="w-1/3 text-center text-sm py-3 px-4">
                    <?= $rows['fname'] ?>
                  </td>
                  <td class="w-1/3 text-center text-sm py-3 px-4">
                    <?= $rows['lname'] ?>
                  </td>
                  <td class="py-2 px-4">
                    <a href="update.php?ServiceID=<?= $rows['ServiceID'] ?>">
                      <button type="submit" name="submit"
                        class="rounded-md border border-custom px-3 py-1 text-sm text-default font-semibold hover:bg-custom2 hover:customtext  ml-2">
                        Edit
                      </button>
                    </a>

                    <a href='deleteEntry.php?UserID=<?= $row['ServiceID'] ?> '>
                      <button type="submit" name="submit"
                        class="rounded-md border border-red-500 px-3 py-1 text-sm text-red-500 font-semibold hover:bg-red-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 ml-2"
                        onclick="return confirm('Are you sure you want to delete this entry?')">
                        Delete
                      </button>
                    </a>

                  </td>
                </tr>
                <?php
              }
            } else {
              echo "
                    <tr>
                      <td colspan='6'>No record found</td>
                    </tr>";
            }
          } else {
            $query = "SELECT * FROM data LIMIT $start_from, $num_per_page";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td class="w-1/3 text-center text-sm py-3 px-4">
                  <?php echo $row['ServiceID'] ?>
                </td>

                <td class="text-center py-3 px-4  text-sm">
                  <?php echo $row['training_name'] ?>
                </td>
                <td class="text-center py-3 px-4  text-sm">
                  <?php echo $row['date'] ?>
                </td>
                <td class="text-center py-3 px-4  text-sm">
                  <?php echo $row['fname'] ?>
                </td>
                <td class="text-center py-3 px-4  text-sm">
                  <?php echo $row['lname'] ?>
                </td>
                <td class="py-2 px-4">
                  <a href="update.php?ServiceID=<?php echo $row['ServiceID'] ?>">
                    <button type="submit" name="submit"
                      class="rounded-md border border-custom px-3 py-1 text-sm text-default font-semibold hover:bg-custom2 hover:customtext  ml-2">
                      Edit
                    </button>
                  </a>

                  <a href='deleteEntry.php?UserID=<?= $row['ServiceID'] ?> '>
                    <button type="submit" name="submit"
                      class="rounded-md border border-red-500 px-3 py-1 text-sm text-red-500 font-semibold hover:bg-red-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 ml-2"
                      onclick="return confirm('Are you sure you want to delete this user?')">
                      Delete
                    </button>
                  </a>






                </td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>


    </div>

    <!-- pagination -->
    <div class="flex items-center justify-center mt-6 mb-3'">
      <div class="flex items-center">
        <?php
        $pr_query = "SELECT * FROM data";
        $pr_result = mysqli_query($conn, $pr_query);
        $total_record = mysqli_num_rows($pr_result);
        $total_page = ceil($total_record / $num_per_page);

        if ($page > 1) {
          echo "<a href='tables.php?page=" . ($page - 1) . "' class='text-gray-600 hover:text-blue-500 border border-gray-300 px-2 rounded-md mr-2'>Previous</a>";
        }

        $start = max(1, $page - 3);
        $end = min($total_page, $page + 3);
        for ($i = $start; $i <= $end; $i++) {
          echo "<a href='tables.php?page=" . $i . "' class='text-gray-600 hover:text-blue-500 border border-gray-300 px-2 rounded-md mr-2 '>$i</a>";
        }

        if ($page < $total_page) {
          echo "<a href='tables.php?page=" . ($page + 1) . "' class='text-gray-600 hover:text-blue-500 border border-gray-300 px-2 rounded-md mr-2'>Next</a>";
        }

        // if ($page > 1) {
        //   echo "<a href='tables.php?page=" . ($page - 1) . "' class='rounded-md bg-custom px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mr-2'>Previous</a>";
        // }
        // for ($i = 1; $i <= $total_page; $i++) {
        //   echo "<a href='tables.php?page=" . $i . "' class='text-gray-600 hover:text-blue-500 border border-gray-300 px-2 rounded-md mr-2'>$i</a>";
        // }
        // if ($i - 1 > $page) {
        //   echo "<a href='tables.php?page=" . ($page + 1) . "' class='rounded-md bg-custom px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>Next</a>";
        // }
        ?>
      </div>
    </div>
    </div>



    </div>
    </div>
    </div>
  </main>
  <!-- end: Main -->

  <script src=" https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./src/script.js"></script>
</body>

</html>