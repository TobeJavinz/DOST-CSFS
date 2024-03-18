<?php

require 'conn.php';

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
  <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
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
  <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
  <!-- end: Sidebar -->


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
      <div class="grid grid-cols-1 gap-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md s  hadow-black/5">
          <!-- diri isulod na div -->
          <section>
            <div class="container">
              <div class="flex flex-wrap -mx-4">
                <div class="w-full overflow-x-auto">
                  <table class="table-auto w-max">
                    <thead>
                      <tr class="bg-primary text-center">
                        <th
                          class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent text-center">
                          Service ID
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc1_1
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc1_2
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc1_3
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc2_1
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc2_2
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc3_1
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          cc3_2
                        </th>
                        <th class="w-1/32 min-w-[200px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Service
                        </th>

                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Training Name
                        </th>
                        <th
                          class="w-1/32 min-w-[200px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                          Date
                        </th>
                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Training Venue
                        </th>
                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Training Type
                        </th>

                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          First Name
                        </th>
                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
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

                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Age
                        </th>

                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
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

                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Customer Category
                        </th>

                        <th class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Sector
                        </th>

                        <th
                          class="w-1/32 min-w-[160px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                          Returning Customer
                        </th>

                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          sqd0
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          sqd1
                        </th>
                        <th
                          class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                          sqd2
                        </th>

                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          sqd3
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          sqd4
                        </th>
                        <th
                          class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                          sqd5
                        </th>

                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          sqd6
                        </th>
                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          sqd7
                        </th>
                        <th
                          class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                          sqd8
                        </th>

                        <th class="w-1/32 min-w-[10px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
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

                        <th class="w-1/32 min-w-[100px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Comments
                        </th>




                        <th class="w-1/32 min-w-[400px] text-lg font-semibold text-black py-4 lg:py-7 px-3 lg:px-4">
                          Actions
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class=" text-center">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>

                          <td>
                            <?php echo $row['ServiceID'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc1_1'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc1_2'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc1_3'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc2_1'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc2_2'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc3_1'] ?>
                          </td>
                          <td>
                            <?php echo $row['cc3_2'] ?>
                          </td>
                          <td>
                            <?php echo $row['service'] ?>
                          </td>
                          <td>
                            <?php echo $row['training_name'] ?>
                          </td>
                          <td>
                            <?php echo $row['date'] ?>
                          </td>
                          <td>
                            <?php echo $row['training_venue'] ?>
                          </td>
                          <td>
                            <?php echo $row['training_type'] ?>
                          </td>
                          <td>
                            <?php echo $row['fname'] ?>
                          </td>
                          <td>
                            <?php echo $row['lname'] ?>
                          </td>
                          <td>
                            <?php echo $row['sex'] ?>
                          </td>
                          <td>
                            <?php echo $row['email'] ?>
                          </td>
                          <td>
                            <?php echo $row['contact_info'] ?>
                          </td>
                          <td>
                            <?php echo $row['home_add'] ?>
                          </td>
                          <td>
                            <?php echo $row['age'] ?>
                          </td>
                          <td>
                            <?php echo $row['designation'] ?>
                          </td>
                          <td>
                            <?php echo $row['company'] ?>
                          </td>
                          <td>
                            <?php echo $row['msme'] ?>
                          </td>
                          <td>
                            <?php echo $row['customer_category'] ?>
                          </td>
                          <td>
                            <?php echo $row['sector'] ?>
                          </td>
                          <td>
                            <?php echo $row['returning_customer'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd0'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd1'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd2'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd3'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd4'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd5'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd6'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd7'] ?>
                          </td>
                          <td>
                            <?php echo $row['sqd8'] ?>
                          </td>
                          <td>
                            <?php echo $row['net_promoter'] ?>
                          </td>
                          <td>
                            <?php echo $row['ateneo'] ?>
                          </td>
                          <td>
                            <?php echo $row['doa'] ?>
                          </td>
                          <td>
                            <?php echo $row['dti'] ?>
                          </td>
                          <td>
                            <?php echo $row['fda'] ?>
                          </td>
                          <td>
                            <?php echo $row['sbc'] ?>
                          </td>
                          <td>
                            <?php echo $row['tesda'] ?>
                          </td>
                          <td>
                            <?php echo $row['uic'] ?>
                          </td>
                          <td>
                            <?php echo $row['other_agency'] ?>
                          </td>
                          <td>
                            <?php echo $row['other_agency_score'] ?>
                          </td>
                          <td>
                            <?php echo $row['overall_mood'] ?>
                          </td>
                          <td>
                            <?php echo $row['comments'] ?>
                          </td>

                          <td>
                            <a href="update.php?ServiceID=<?php echo $row['ServiceID'] ?>">
                              <button type="submit" name="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mb-1 w-full">
                                Edit
                              </button>
                            </a>
                            <a href="delete_page.php?ServiceID=<?php echo $row['ServiceID'] ?>">
                              <button type="submit" name="submit"
                                class="rounded-md border px-3 py-2 text-sm font-semibold text-red-600 hover:bg-red-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 w-full">
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
              </div>
            </div>
          </section>
        </div>

      </div>
    </div>

    Service ID: 12
    <br>
    cc1_1: 1

  </main>
  <!-- end: Main -->

  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/src/dashboard.js"></script>
</body>

</html>