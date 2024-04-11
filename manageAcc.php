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
if (isset($_GET['search']))
  $start_from = ($page - 1) * $num_per_page; // Assuming $page and $num_per_page are defined elsewhere
$query = "SELECT UserID, username, password, name, position, admin FROM user_cred LIMIT $start_from, $num_per_page";

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

            <h1 class="text-2xl font-bold text-gray-800">USERS</h1>
            <form method="GET">
              <div class="flex items-center py-2 rounded-md">
                <div class="flex">

                </div>
              </div>
            </form>
          </div>




          <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="table-auto w-full bg-white mb-4">
              <thead class="bg-custom h-10 text-white >
                <tr class=" text-center">

               


                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                  Username
                </th>


                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                  Name
                </th>
                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm text-center">
                  Position
                </th>
                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm text-center">
                  Admin
                </th>
                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm text-center">
                  Actions
                </th>
                </tr>
              </thead>
              <tbody class=" text-center text-gray-500 ">
                <?php
              
                  
                  $query = "SELECT * FROM user_cred LIMIT $start_from, $num_per_page";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      

                      <td class="text-center py-3 px-4  text-sm">
                        <?php echo $row['username'] ?>
                      </td>

                      <td class="text-center py-3 px-4  text-sm">
                        <?php echo $row['name'] ?>
                      </td>
                      <td class="text-center py-3 px-4  text-sm">
                        <?php echo $row['position'] ?>
                      </td>
                      <td class="text-center py-3 px-4  text-sm">
                        <?php echo $row['admin'] ?>
                      </td>
                      <td class="py-2 px-4">
                        <a href="updateAcc.php?UserID=<?php echo $row['UserID'] ?> ">
                        <button type="submit" name="submit"
                          class="rounded-md border border-custom px-3 py-1 text-sm text-default font-semibold hover:bg-custom2 hover:customtext  ml-2">
                          Edit
                        </button>
                        </a>
                        <a href='deleteAcc.php?UserID=<?= $row['UserID'] ?> '>
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
                
              
                ?>
              </tbody>
            </table>


          </div>

          <!-- pagination -->
          <div class="flex items-center justify-center mt-6">
            <div class="flex items-center">
              <?php
              $pr_query = "SELECT * FROM data";
              $pr_result = mysqli_query($conn, $pr_query);
              $total_record = mysqli_num_rows($pr_result);
              $total_page = ceil($total_record / $num_per_page);

              if ($page > 1) {
                echo "<a href='tables.php?page=" . ($page - 1) . "' class='rounded-md bg-custom px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mr-2'>Previous</a>";
              }
              for ($i = 1; $i <= $total_page; $i++) {
                echo "<a href='tables.php?page=" . $i . "' class='text-gray-600 hover:text-blue-500 border border-gray-300 px-2 rounded-md mr-2'>$i</a>";
              }
              if ($i - 1 > $page) {
                echo "<a href='tables.php?page=" . ($page + 1) . "' class='rounded-md bg-custom px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>Next</a>";
              }
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