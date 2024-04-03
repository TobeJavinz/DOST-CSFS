<!DOCTYPE html>
<html class="h-full bg-white">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="./src/output.css" rel="stylesheet" />
</head>

<body class="h-full">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">

      <img class="mx-auto pl-4 w-64" src="assets/csfs.png" alt="Your Company" />
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
        DOST-CSFS Admin Only
      </h2>
    </div>

    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required
              class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 mb-2" />
          </div>
        </div>

        <div>
          <div class=" flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required
              class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-gray input-spinner outline-none focus:ring-2 focus:ring-inset focus:ring-custom sm:text-sm sm:leading-6 mb-3" />
          </div>
          <input type="checkbox" id="showPassword" class="ml-4  mb-6">
          <label for="showPassword" class=" text-gray-100 text-sm">Show
            Password</label>
        </div>


      </form>
      <div>
        <a href="tables.php">
          <button
            class="flex w-full justify-center rounded-md bg-custom px-3 py-1.5 mb-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-custom2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Sign in
          </button>
        </a>
      </div>
    </div>
  </div>

  <script src="./src/script.js"></script>
</body>

</html>