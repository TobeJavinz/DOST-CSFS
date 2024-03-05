<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    /> 
    <link href="./src/output.css" rel="stylesheet" />



  </head>

  <body class="text-gray-800 font-inter">
    <!-- start: Sidebar -->
    <div
      class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform"
    >
      <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="./assets/1.png" alt="" class="w-8 h-8 rounded object-cover" />
        <span class="text-lg font-bold text-white ml-3">DOST CSFS</span>
      </a>
      <ul class="mt-4">
        <li class="mb-1 group">
          <a
            href="./dashboard.php"
            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="ri-home-2-line mr-3 text-lg"></i>
            <span class="text-sm">Dashboard</span>
          </a>
        </li>

        <li class="mb-1 group active">
          <a
            href="#"
            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="ri-survey-line mr-3 text-lg"></i>
            <span class="text-sm">Forms</span>
          </a>
        </li>

        <li class="mb-1 group">
          <a
            href="./reports.php"
            class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="ri-settings-2-line mr-3 text-lg"></i>
            <span class="text-sm">Reports</span>
          </a>
        </li>
      </ul>
    </div>
    <div
      class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"
    ></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main
      class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main"
    >
      <div
        class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30"
      >
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
              <img
                src="https://placehold.co/32x32"
                alt=""
                class="w-8 h-8 rounded block object-cover align-middle"
              />
            </button>
            <ul
              class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]"
            >
              <li>
                <a
                  href="#"
                  class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                  >Profile</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                  >Setting</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                  >Logout</a
                >
              </li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- content -->

      <div class="p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
          <div
            class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5"
          >
            <div class="flex justify-between mb-20">
              <!-- diri isulod na div -->
              <div>
                <div class="text-2xl font-semibold mb-1">
                  Personal Information
                </div>
                <div class="sm:col-span-3">
                  <label
                    for="country"
                    class="block text-sm font-medium leading-6 text-gray-900 pt-8"
                    >Type of Service</label
                  >
                  <div class="mt-2">
                    <select
                      id="sex"
                      name="sex"
                      autocomplete="sex-choice"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                    >
                      <option>Select Options</option>
                      <option>Technology Intervention</option>
                      <option>Technology Training</option>
                      <option>Technology Forum/Seminar</option>
                      <option>Consultancy Services</option>
                      <option>Testing and Calibration</option>
                      <option>Packaging and Labeling Services</option>
                      <option>Scholarship Program Services</option>
                      <option>Formula and Conversion</option>
                      <option>R&D Management</option>
                    </select>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label
                    for="email"
                    class="block text-sm font-medium leading-6 text-gray-900 pt-8"
                    >Training Title</label
                  >
                  <div class="mt-2">
                    <input
                      id="email"
                      name="email"
                      type="email"
                      autocomplete="email"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                  </div>
                </div>

                <!-- basinc info btns -->
                <div class="flex items-center mb-4 order-tab">
                  <div class="border-b border-gray-900/10">
                    <div
                      class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                      <div class="sm:col-span-3">
                        <label
                          for="first-name"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >First name</label
                        >
                        <div class="mt-2">
                          <input
                            type="text"
                            name="first-name"
                            id="first-name"
                            autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-3">
                        <label
                          for="last-name"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Last name</label
                        >
                        <div class="mt-2">
                          <input
                            type="text"
                            name="last-name"
                            id="last-name"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-3">
                        <label
                          for="country"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Sex</label
                        >
                        <div class="mt-2">
                          <select
                            id="sex"
                            name="sex"
                            autocomplete="sex-choice"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                          >
                            <option>Select Options</option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>

                      <div class="sm:col-span-4">
                        <label
                          for="email"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Email address</label
                        >
                        <div class="mt-2">
                          <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-4">
                        <label
                          for="email"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Contact No.</label
                        >
                        <div class="mt-2">
                          <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-4">
                        <label
                          for="email"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Date</label
                        >
                        <div class="mt-2">
                          <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="col-span-full">
                        <label
                          for="street-address"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Address</label
                        >
                        <div class="mt-2">
                          <input
                            type="text"
                            name="street-address"
                            id="street-address"
                            autocomplete="street-address"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-2 sm:col-start-1">
                        <label
                          for="city"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Age</label
                        >
                        <div class="mt-2">
                          <input
                            type="text"
                            name="city"
                            id="city"
                            autocomplete="address-level2"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-2">
                        <label
                          for="region"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Designation</label
                        >
                        <div class="mt-2">
                          <input
                            type="text"
                            name="region"
                            id="region"
                            autocomplete="address-level1"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>

                      <div class="sm:col-span-2">
                        <label
                          for="postal-code"
                          class="block text-sm font-medium leading-6 text-gray-900"
                          >Company Name</label
                        >
                        <div class="mt-2">
                          <input
                            type="text"
                            name="postal-code"
                            id="postal-code"
                            autocomplete="postal-code"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                          />
                        </div>
                      </div>
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
    <script src="/src/dashboard.js"></script>
  </body>
</html>
