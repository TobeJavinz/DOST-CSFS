<!-- start: Sidebar -->

<div
    class="fixed left-0 top-0 w-64 h-full bg-white  shadow-md shadow-black/6 p-4 z-50 sidebar-menu transition-transform ">
    <a href=" #" class="flex items-center pb-4 ">
        <img src="./assets/csfs.png" alt="" class="rounded object-cover ml-4" />

    </a>
    <ul class="mt-4">
        <li class="mb-1 group">
            <a href="./dashboard.php" class=" flex items-center py-2 px-4 font-semibold text-black hover:bg-custom hover:customtext rounded-md
                group-[.active]:bg-gray-800 group-[.active]:text-white
                group-[.selected]:text-gray-100 active">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>

        <?php if (!isset($_SESSION['login'])):?>
        <li class="mb-1 group">
            <a href="./forms.php" class=" flex items-center py-2 px-4 font-semibold text-black hover:bg-custom hover:customtext rounded-md
                group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950
                group-[.selected]:text-gray-10 active">
                <i class=" ri-survey-line mr-3 text-lg"></i>
                <span class="text-sm">Forms</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="mb-1 group">
            <a href="./reports.php" class=" flex items-center py-2 px-4 font-semibold text-black hover:bg-custom hover:customtext rounded-md
                ">
                <i class="ri-file-chart-line mr-3 text-lg"></i>
                <span class=" text-sm">Reports</span>
            </a>
        </li>

    <?php if (isset($_SESSION['login'])): ?>
        <li class="mb-1 group">
            <a href="./admin.php" class="flex items-center py-2 px-4 font-semibold text-black hover:bg-custom hover:customtext rounded-md">
                <i class="ri-admin-line mr-3 text-lg"></i>
                <span class="text-sm">Edit</span>
            </a>
        </li>
    <?php endif; ?>
        
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->