<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: admin.php");
}

require 'DBConn.php';

// Establish database connection
$conn = connect_to_database();

// Perform a query
$query = "SELECT * FROM data";
$result = mysqli_query($conn, $query);
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

  <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
      <button type="button" class="text-lg text-gray-600 sidebar-toggle">
        <i class="ri-menu-line"></i>
      </button>
      <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
          <a class="text-base text-black font-bold">CSF Respondents</a>
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
    <!-- content -->
    <div class="p-6">
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">

        <div class="md:px-32 py-8 w-full">
          <div class="flex mb-4">
            <h1 class="text-2xl font-bold text-gray-800">CSF Respondents</h1>
          </div>

          <div class="flex items-center justify-between mb-10">
            <h2 class="text-lg font-semibold text-gray-800">All Data</h2>
            <div class="flex items-center">
              <label for="search" class="mr-2">Search:</label>
              <div class="flex">
                <input type="text" id="search" name="search"
                  class="border border-gray-300 px-1 py-1 pl-2px rounded-md mr-3" />
                <button type="button" class="rounded-md bg-indigo-600 px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg
                <button type=" button"
                  class="rounded-md bg-indigo-600 px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  Search
                </button>
              </div>
            </div>
          </div>



          <table class="table-auto w-full bg-white">
            <thead class="bg-gray-800 text-black">
              <tr class="text-center">
                <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">
                  Service ID
                </th>

                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm text-center">
                  Service
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
            <tbody class=" text-center text-gray-500">
              <tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                <tr>
                  <td class="w-1/3 text-center text-sm py-3 px-4">
                    <?php echo $row['ServiceID'] ?>
                  </td>
                  <td class="py-3 px-4 text-sm text-center">
                    <?php echo $row['service'] ?>
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
                        class="rounded-md bg-indigo-600 px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mb-1">
                        Edit
                      </button>
                    </a>
                    <a href="delete_page.php?ServiceID=<?php echo $row['ServiceID'] ?>">
                      <button type="submit" name="submit"
                        class="rounded-md border px-3 py-1 text-sm font-semibold hover:bg-red-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 ml-2">
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

          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center">
              <label for="rowsPerPage" class="mr-2 font-bold">Rows per page:</label>
              <select id="rowsPerPage" name="rowsPerPage"
                class="border border-gray-300 px-1 py-1 pl-2px rounded-md mr-3">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>

            <ul class="flex items-center">
              <li class="mr-1">
                <a href="#" class="text-gray-600 hover:text-blue-500 px-2 py-1 rounded-md"><button type="button"
                    class="rounded-md bg-indigo-600 px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Previous
                  </button></a>
              </li>
              <li class="mr-1">
                <a href="#" class="text-gray-600 hover:text-blue-500 border border-gray-300 px-2 py-1 rounded-md">1</a>
              </li>
              <li class="mr-1">
                <a href="#" class="text-gray-600 hover:text-blue-500 border border-gray-300 px-2 py-1 rounded-md">2</a>
              </li>
              <li class="mr-1">
                <a href="#"
                  class="text-gray-600 hover:text-blue-500 border border-gray-300 px-2 py-1 rounded-md mr-2">3</a>
              </li>
              <li class="mr-1">
                <a href="#" class="text-gray-600 hover:text-blue-500px-2 py-1 rounded-md mr-3"><button type="button"
                    class="rounded-md bg-indigo-600 px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Next
                  </button></a>
              </li>
            </ul>
          </div>
        </div>
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