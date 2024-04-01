<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");



session_start();
include 'DBconn.php';
$conn = connect_to_database();

// Start the session
$total_services = 0;
$total_training_names = 0;
$total_companies = 0;
$total_sectors = 0;
$returning_customers = 0;
$first_time_customers = 0;
$total_male = 0;
$total_female = 0;
$start_date = 00 - 00 - 0000;
$end_date = 00 - 00 - 0000;
$training_name = '';
$service = '';
$msme_count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the start date, end date, service, and training name from user input
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $service = $_POST['service'];
  $training_name = $_POST['training_name'];


  $sql = "SELECT
  total_services,
  total_training_names,
  total_companies,
  total_sectors,
  returning_customers,
  first_time_customers,
  total_male,
  total_female,
  company_names,
  training_name,
  service,
  sector
FROM
  (
      SELECT
          COUNT(DISTINCT service) AS total_services,
          COUNT(DISTINCT training_name) AS total_training_names,
          COUNT(DISTINCT company) AS total_companies,
          COUNT(*) AS total_sectors,
          GROUP_CONCAT(DISTINCT company) AS company_names,
          GROUP_CONCAT(DISTINCT training_name) AS training_name,
          GROUP_CONCAT(DISTINCT service) AS service,
          GROUP_CONCAT(DISTINCT sector) AS sector,
          SUM(CASE WHEN sex = 'Male' THEN 1 ELSE 0 END) AS total_male,
          SUM(CASE WHEN sex = 'Female' THEN 1 ELSE 0 END) AS total_female,
          SUM(CASE WHEN returning_customer = 'yes' THEN 1 ELSE 0 END) AS returning_customers,
          SUM(CASE WHEN returning_customer = 'no' THEN 1 ELSE 0 END) AS first_time_customers
      FROM
          data
      WHERE
      ('$start_date' = '' OR date BETWEEN '$start_date' AND '$end_date')
            AND ('$service' = '' OR service = '$service')
            AND ('$training_name' = '' OR training_name = '$training_name')
  ) AS subquery;
";

  $result = $conn->query($sql);
  // Check if the query was successful
  if ($result) {
    // Fetch the result
    $row = $result->fetch_assoc();

    // Get the general information
    // $sector = $row['sector'];
    $sector_number = $row['total_sectors'];
    $total_services = $row['total_services'];
    $total_training_names = $row['total_training_names'];
    $total_companies = $row['total_companies'];
    $company_names = $row['company_names'];
    $training_name = $row['training_name'];
    $total_sectors = $row['total_sectors'];
    $returning_customers = $row['returning_customers'];
    $first_time_customers = $row['first_time_customers'];
    $total_male = $row['total_male'];
    $total_female = $row['total_female'];





    $training_name = explode(',', $row['training_name']);
    $company_names = explode(',', $row['company_names']);
    $service = explode(',', $row['service']);
  } else {
    // Handle the case where the query fails
    echo "Error: " . $conn->error;
  };

  $SearchService = isset($_POST['service']) ? $_POST['service'] : '';
  $SearchTraining_name = isset($_POST['training_name']) ? $_POST['training_name'] : '';

  $sql1 = "SELECT 
      subquery.sector, 
      subquery.sector_count 
    FROM 
      (
          SELECT 
              sector, 
              COUNT(*) AS sector_count
          FROM 
              data 
          WHERE 
              ('$start_date' = '' OR date BETWEEN '$start_date' AND '$end_date') 
              AND ('$SearchService' = '' OR service = '$SearchService') 
              AND ('$SearchTraining_name' = '' OR training_name = '$SearchTraining_name') 
          GROUP BY 
              sector
      ) AS subquery";

  $result1 = $conn->query($sql1);
  // Check if the query was successful
  if ($result1) {
    $sectors = $result1->fetch_all(MYSQLI_ASSOC);
  } else {
    // Handle the case where the query fails
    echo "Error: " . $conn->error;
  }

  // retreiving RESPONSES
  $sql2 = "SELECT 
  SUM(CASE WHEN sqd1 = 1 THEN 1 ELSE 0 END) AS SQD_1SD,
  SUM(CASE WHEN sqd1 = 2 THEN 1 ELSE 0 END) AS SQD_1D,
  SUM(CASE WHEN sqd1 = 3 THEN 1 ELSE 0 END) AS SQD_1NAD,
  SUM(CASE WHEN sqd1 = 4 THEN 1 ELSE 0 END) AS SQD_1A,
  SUM(CASE WHEN sqd1 = 5 THEN 1 ELSE 0 END) AS SQD_1SA,

  SUM(CASE WHEN sqd2 = 1 THEN 1 ELSE 0 END) AS SQD_2SD,
  SUM(CASE WHEN sqd2 = 2 THEN 1 ELSE 0 END) AS SQD_2D,
  SUM(CASE WHEN sqd2 = 3 THEN 1 ELSE 0 END) AS SQD_2NAD,
  SUM(CASE WHEN sqd2 = 4 THEN 1 ELSE 0 END) AS SQD_2A,
  SUM(CASE WHEN sqd2 = 5 THEN 1 ELSE 0 END) AS SQD_2SA,
  SUM(CASE WHEN sqd3 = 1 THEN 1 ELSE 0 END) AS SQD_3SD,
  SUM(CASE WHEN sqd3 = 2 THEN 1 ELSE 0 END) AS SQD_3D,
  SUM(CASE WHEN sqd3 = 3 THEN 1 ELSE 0 END) AS SQD_3NAD,
  SUM(CASE WHEN sqd3 = 4 THEN 1 ELSE 0 END) AS SQD_3A,
  SUM(CASE WHEN sqd3 = 5 THEN 1 ELSE 0 END) AS SQD_3SA,

  SUM(CASE WHEN sqd4 = 1 THEN 1 ELSE 0 END) AS SQD_4SD,
  SUM(CASE WHEN sqd4 = 2 THEN 1 ELSE 0 END) AS SQD_4D,
  SUM(CASE WHEN sqd4 = 3 THEN 1 ELSE 0 END) AS SQD_4NAD,
  SUM(CASE WHEN sqd4 = 4 THEN 1 ELSE 0 END) AS SQD_4A,
  SUM(CASE WHEN sqd4 = 5 THEN 1 ELSE 0 END) AS SQD_4SA,

  SUM(CASE WHEN sqd5 = 1 THEN 1 ELSE 0 END) AS SQD_5SD,
  SUM(CASE WHEN sqd5 = 2 THEN 1 ELSE 0 END) AS SQD_5D,
  SUM(CASE WHEN sqd5 = 3 THEN 1 ELSE 0 END) AS SQD_5NAD,
  SUM(CASE WHEN sqd5 = 4 THEN 1 ELSE 0 END) AS SQD_5A,
  SUM(CASE WHEN sqd5 = 5 THEN 1 ELSE 0 END) AS SQD_5SA,

  SUM(CASE WHEN sqd6 = 1 THEN 1 ELSE 0 END) AS SQD_6SD,
  SUM(CASE WHEN sqd6 = 2 THEN 1 ELSE 0 END) AS SQD_6D,
  SUM(CASE WHEN sqd6 = 3 THEN 1 ELSE 0 END) AS SQD_6NAD,
  SUM(CASE WHEN sqd6 = 4 THEN 1 ELSE 0 END) AS SQD_6A,
  SUM(CASE WHEN sqd6 = 5 THEN 1 ELSE 0 END) AS SQD_6SA,

  SUM(CASE WHEN sqd7 = 1 THEN 1 ELSE 0 END) AS SQD_7SD,
  SUM(CASE WHEN sqd7 = 2 THEN 1 ELSE 0 END) AS SQD_7D,
  SUM(CASE WHEN sqd7 = 3 THEN 1 ELSE 0 END) AS SQD_7NAD,
  SUM(CASE WHEN sqd7 = 4 THEN 1 ELSE 0 END) AS SQD_7A,
  SUM(CASE WHEN sqd7 = 5 THEN 1 ELSE 0 END) AS SQD_7SA,

  SUM(CASE WHEN sqd8 = 1 THEN 1 ELSE 0 END) AS SQD_8SD,
  SUM(CASE WHEN sqd8 = 2 THEN 1 ELSE 0 END) AS SQD_8D,
  SUM(CASE WHEN sqd8 = 3 THEN 1 ELSE 0 END) AS SQD_8NAD,
  SUM(CASE WHEN sqd8 = 4 THEN 1 ELSE 0 END) AS SQD_8A,
  SUM(CASE WHEN sqd8 = 5 THEN 1 ELSE 0 END) AS SQD_8SA,

  SUM(CASE WHEN net_promoter = 1 THEN 1 ELSE 0 END) AS NET_PROMOTER_1,
  SUM(CASE WHEN net_promoter = 2 THEN 1 ELSE 0 END) AS NET_PROMOTER_2,
  SUM(CASE WHEN net_promoter = 3 THEN 1 ELSE 0 END) AS NET_PROMOTER_3,
  SUM(CASE WHEN net_promoter = 4 THEN 1 ELSE 0 END) AS NET_PROMOTER_4,
  SUM(CASE WHEN net_promoter = 5 THEN 1 ELSE 0 END) AS NET_PROMOTER_5,

  SUM(CASE WHEN ateneo = 1 THEN 1 ELSE 0 END) AS ateneo_1,
  SUM(CASE WHEN ateneo = 2 THEN 1 ELSE 0 END) AS ateneo_2,
  SUM(CASE WHEN ateneo = 3 THEN 1 ELSE 0 END) AS ateneo_3,
  SUM(CASE WHEN ateneo = 4 THEN 1 ELSE 0 END) AS ateneo_4,
  SUM(CASE WHEN ateneo = 5 THEN 1 ELSE 0 END) AS ateneo_5,

  SUM(CASE WHEN doa = 1 THEN 1 ELSE 0 END) AS doa_1,
  SUM(CASE WHEN doa = 2 THEN 1 ELSE 0 END) AS doa_2,
  SUM(CASE WHEN doa = 3 THEN 1 ELSE 0 END) AS doa_3,  
  SUM(CASE WHEN doa = 4 THEN 1 ELSE 0 END) AS doa_4,
  SUM(CASE WHEN doa = 5 THEN 1 ELSE 0 END) AS doa_5,

  SUM(CASE WHEN dti = 1 THEN 1 ELSE 0 END) AS dti_1,
  SUM(CASE WHEN dti = 2 THEN 1 ELSE 0 END) AS dti_2,
  SUM(CASE WHEN dti = 3 THEN 1 ELSE 0 END) AS dti_3,
  SUM(CASE WHEN dti = 4 THEN 1 ELSE 0 END) AS dti_4,
  SUM(CASE WHEN dti = 5 THEN 1 ELSE 0 END) AS dti_5,

  SUM(CASE WHEN fda = 1 THEN 1 ELSE 0 END) AS fda_1,
  SUM(CASE WHEN fda = 2 THEN 1 ELSE 0 END) AS fda_2,
  SUM(CASE WHEN fda = 3 THEN 1 ELSE 0 END) AS fda_3,
  SUM(CASE WHEN fda = 4 THEN 1 ELSE 0 END) AS fda_4,
  SUM(CASE WHEN fda = 5 THEN 1 ELSE 0 END) AS fda_5,

  SUM(CASE WHEN sbc = 1 THEN 1 ELSE 0 END) AS sbc_1,
  SUM(CASE WHEN sbc = 2 THEN 1 ELSE 0 END) AS sbc_2,
  SUM(CASE WHEN sbc = 3 THEN 1 ELSE 0 END) AS sbc_3,
  SUM(CASE WHEN sbc = 4 THEN 1 ELSE 0 END) AS sbc_4,
  SUM(CASE WHEN sbc = 5 THEN 1 ELSE 0 END) AS sbc_5,

  SUM(CASE WHEN tesda = 1 THEN 1 ELSE 0 END) AS tesda_1,
  SUM(CASE WHEN tesda = 2 THEN 1 ELSE 0 END) AS tesda_2,
  SUM(CASE WHEN tesda = 3 THEN 1 ELSE 0 END) AS tesda_3,
  SUM(CASE WHEN tesda = 4 THEN 1 ELSE 0 END) AS tesda_4,
  SUM(CASE WHEN tesda = 5 THEN 1 ELSE 0 END) AS tesda_5,

  SUM(CASE WHEN uic = 1 THEN 1 ELSE 0 END) AS uic_1,
  SUM(CASE WHEN uic = 2 THEN 1 ELSE 0 END) AS uic_2,
  SUM(CASE WHEN uic = 3 THEN 1 ELSE 0 END) AS uic_3,
  SUM(CASE WHEN uic = 4 THEN 1 ELSE 0 END) AS uic_4,
  SUM(CASE WHEN uic = 5 THEN 1 ELSE 0 END) AS uic_5,

  SUM(CASE WHEN other_agency_score = 1 THEN 1 ELSE 0 END) AS other_agency_1,
  SUM(CASE WHEN other_agency_score = 2 THEN 1 ELSE 0 END) AS other_agency_2,
  SUM(CASE WHEN other_agency_score = 3 THEN 1 ELSE 0 END) AS other_agency_3,
  SUM(CASE WHEN other_agency_score = 4 THEN 1 ELSE 0 END) AS other_agency_4,
  SUM(CASE WHEN other_agency_score = 5 THEN 1 ELSE 0 END) AS other_agency_5,

  SUM(CASE WHEN msme = 'yes' THEN 1 ELSE 0 END) AS msme_count,

  SUM(CASE WHEN training_type = 'food' THEN 1 ELSE 0 END) AS food_count,
  SUM(CASE WHEN training_type = 'non-food' THEN 1 ELSE 0 END) AS nonfood_count,

  SUM(CASE WHEN customer_category = 'youth' THEN 1 ELSE 0 END) AS youth_count,
  SUM(CASE WHEN customer_category = '4Ps Member' THEN 1 ELSE 0 END) AS FPs_count,
  SUM(CASE WHEN customer_category = 'IP Group Member' THEN 1 ELSE 0 END) AS IP_count,
  SUM(CASE WHEN customer_category = 'Differently-Abled' THEN 1 ELSE 0 END) AS DA_count,
  SUM(CASE WHEN customer_category = 'SC' THEN 1 ELSE 0 END) AS SC_count,
  
  SUM(CASE WHEN sector = 'academe' THEN 1 ELSE 0 END) AS acad_count,
  SUM(CASE WHEN sector = 'cso' THEN 1 ELSE 0 END) AS cso_count,
  SUM(CASE WHEN sector = 'industry' THEN 1 ELSE 0 END) AS ind_count,
  SUM(CASE WHEN sector = 'government' THEN 1 ELSE 0 END) AS gov_count,
  SUM(CASE WHEN sector = 'media' THEN 1 ELSE 0 END) AS med_count,

  other_agency,
  cc1_1,
  cc1_2,
  cc1_3,
  cc2_1,
  cc2_2,
  cc3_1,
  cc3_2,
  training_venue,
  date,
  company

  FROM 
  data
  WHERE 
  ('$start_date' = '' OR date BETWEEN '$start_date' AND '$end_date') 
  AND ('$SearchService' = '' OR service = '$SearchService') 
  AND ('$SearchTraining_name' = '' OR training_name = '$SearchTraining_name')";

  $result2 = $conn->query($sql2);
  if ($result2) {
    $resp = $result2->fetch_assoc(); // Use fetch_assoc() to get a single row

    $_SESSION['SQD_1SD'] = $resp['SQD_1SD'];
    $_SESSION['SQD_1D'] = $resp['SQD_1D'];
    $_SESSION['SQD_1NAD'] = $resp['SQD_1NAD'];
    $_SESSION['SQD_1A'] = $resp['SQD_1A'];
    $_SESSION['SQD_1SA'] = $resp['SQD_1SA'];

    $_SESSION['SQD_2SD'] = $resp['SQD_2SD'];
    $_SESSION['SQD_2D'] = $resp['SQD_2D'];
    $_SESSION['SQD_2NAD'] = $resp['SQD_2NAD'];
    $_SESSION['SQD_2A'] = $resp['SQD_2A'];
    $_SESSION['SQD_2SA'] = $resp['SQD_2SA'];

    $_SESSION['SQD_3SD'] = $resp['SQD_3SD'];
    $_SESSION['SQD_3D'] = $resp['SQD_3D'];
    $_SESSION['SQD_3NAD'] = $resp['SQD_3NAD'];
    $_SESSION['SQD_3A'] = $resp['SQD_3A'];
    $_SESSION['SQD_3SA'] = $resp['SQD_3SA'];

    $_SESSION['SQD_4SD'] = $resp['SQD_4SD'];
    $_SESSION['SQD_4D'] = $resp['SQD_4D'];
    $_SESSION['SQD_4NAD'] = $resp['SQD_4NAD'];
    $_SESSION['SQD_4A'] = $resp['SQD_4A'];
    $_SESSION['SQD_4SA'] = $resp['SQD_4SA'];

    $_SESSION['SQD_5SD'] = $resp['SQD_5SD'];
    $_SESSION['SQD_5D'] = $resp['SQD_5D'];
    $_SESSION['SQD_5NAD'] = $resp['SQD_5NAD'];
    $_SESSION['SQD_5A'] = $resp['SQD_5A'];
    $_SESSION['SQD_5SA'] = $resp['SQD_5SA'];

    $_SESSION['SQD_6SD'] = $resp['SQD_6SD'];
    $_SESSION['SQD_6D'] = $resp['SQD_6D'];
    $_SESSION['SQD_6NAD'] = $resp['SQD_6NAD'];
    $_SESSION['SQD_6A'] = $resp['SQD_6A'];
    $_SESSION['SQD_6SA'] = $resp['SQD_6SA'];

    $_SESSION['SQD_7SD'] = $resp['SQD_7SD'];
    $_SESSION['SQD_7D'] = $resp['SQD_7D'];
    $_SESSION['SQD_7NAD'] = $resp['SQD_7NAD'];
    $_SESSION['SQD_7A'] = $resp['SQD_7A'];
    $_SESSION['SQD_7SA'] = $resp['SQD_7SA'];

    $_SESSION['SQD_8SD'] = $resp['SQD_8SD'];
    $_SESSION['SQD_8D'] = $resp['SQD_8D'];
    $_SESSION['SQD_8NAD'] = $resp['SQD_8NAD'];
    $_SESSION['SQD_8A'] = $resp['SQD_8A'];
    $_SESSION['SQD_8SA'] = $resp['SQD_8SA'];

    $_SESSION['NET_PROMOTER_1'] = $resp['NET_PROMOTER_1'];
    $_SESSION['NET_PROMOTER_2'] = $resp['NET_PROMOTER_2'];
    $_SESSION['NET_PROMOTER_3'] = $resp['NET_PROMOTER_3'];
    $_SESSION['NET_PROMOTER_4'] = $resp['NET_PROMOTER_4'];
    $_SESSION['NET_PROMOTER_5'] = $resp['NET_PROMOTER_5'];

    $_SESSION['cc1_1'] = $resp['cc1_1'];
    $_SESSION['cc1_2'] = $resp['cc1_2'];
    $_SESSION['cc1_3'] = $resp['cc1_3'];
    $_SESSION['cc2_1'] = $resp['cc2_1'];
    $_SESSION['cc2_2'] = $resp['cc2_2'];
    $_SESSION['cc3_1'] = $resp['cc3_1'];
    $_SESSION['cc3_2'] = $resp['cc3_2'];

    $_SESSION['training_name'] = $SearchTraining_name;
    $_SESSION['training_venue'] = $resp['training_venue'];
    $_SESSION['date'] = $resp['date'];

    $_SESSION['ateneo_1'] = $resp['ateneo_1'];
    $_SESSION['ateneo_2'] = $resp['ateneo_2'];
    $_SESSION['ateneo_3'] = $resp['ateneo_3'];
    $_SESSION['ateneo_4'] = $resp['ateneo_4'];
    $_SESSION['ateneo_5'] = $resp['ateneo_5'];

    $_SESSION['doa_1'] = $resp['doa_1'];
    $_SESSION['doa_2'] = $resp['doa_2'];
    $_SESSION['doa_3'] = $resp['doa_3'];
    $_SESSION['doa_4'] = $resp['doa_4'];
    $_SESSION['doa_5'] = $resp['doa_5'];

    $_SESSION['dti_1'] = $resp['dti_1'];
    $_SESSION['dti_2'] = $resp['dti_2'];
    $_SESSION['dti_3'] = $resp['dti_3'];
    $_SESSION['dti_4'] = $resp['dti_4'];
    $_SESSION['dti_5'] = $resp['dti_5'];

    $_SESSION['fda_1'] = $resp['fda_1'];
    $_SESSION['fda_2'] = $resp['fda_2'];
    $_SESSION['fda_3'] = $resp['fda_3'];
    $_SESSION['fda_4'] = $resp['fda_4'];
    $_SESSION['fda_5'] = $resp['fda_5'];

    $_SESSION['sbc_1'] = $resp['sbc_1'];
    $_SESSION['sbc_2'] = $resp['sbc_2'];
    $_SESSION['sbc_3'] = $resp['sbc_3'];
    $_SESSION['sbc_4'] = $resp['sbc_4'];
    $_SESSION['sbc_5'] = $resp['sbc_5'];

    $_SESSION['other_agency'] = $resp['other_agency'];
    $_SESSION['other_agency_1'] = $resp['other_agency_1'];
    $_SESSION['other_agency_2'] = $resp['other_agency_2'];
    $_SESSION['other_agency_3'] = $resp['other_agency_3'];
    $_SESSION['other_agency_4'] = $resp['other_agency_4'];
    $_SESSION['other_agency_5'] = $resp['other_agency_5'];

    $msme_count = $resp['msme_count'];
    $_SESSION['food_count'] = $resp['food_count'];
    $_SESSION['nonfood_count'] = $resp['nonfood_count'];

    $_SESSION['youth_count'] = $resp['youth_count'];
    $_SESSION['FPs_count'] = $resp['FPs_count'];
    $_SESSION['IP_count'] = $resp['IP_count'];
    $_SESSION['DA_count'] = $resp['DA_count'];
    $_SESSION['SC_count'] = $resp['SC_count'];

    $_SESSION['acad_count'] = $resp['acad_count'];
    $_SESSION['cso_count'] = $resp['cso_count'];
    $_SESSION['ind_count'] = $resp['ind_count'];
    $_SESSION['gov_count'] = $resp['gov_count'];
    $_SESSION['med_count'] = $resp['med_count'];
  } else {
    // Handle the case where the query fails
    echo "Error: " . $conn->error;
  }

  // Gettingv commenrs separetu
  $com = "SELECT comments FROM data";

  // Execute the query
  $result4 = $conn->query($com);

  // Check if the query was successful
  if ($result4) {
    // Fetch all the comments from the result
    $comments = [];
    while ($row4 = $result4->fetch_assoc()) {
      $comments[] = $row4['comments'];
    }
    $_SESSION['comments'] = array();

    // Store the comments in the session as an array
    if (!isset($_SESSION['comments'])) {
      $_SESSION['comments'] = [];
    }
    $_SESSION['comments'] = $comments;
  } else {
    // Handle the case where the query fails
    echo "Error: " . $conn->error;
  }


  $mood = "SELECT 
CASE 
    WHEN COUNT(*) > 1 THEN 
        FIRST_VALUE(overall_mood) OVER (ORDER BY COUNT(*) DESC, mood_weight DESC)
    ELSE 
        overall_mood
END AS final_mood
FROM (
SELECT 
    overall_mood,
    COUNT(*) OVER (PARTITION BY overall_mood) AS mood_count,
    CASE 
        WHEN overall_mood = 'Delighted' THEN 5
        WHEN overall_mood = 'Satisfied' THEN 4
        WHEN overall_mood = 'Neutral' THEN 3
        WHEN overall_mood = 'Unsatisfied' THEN 2
        WHEN overall_mood = 'Disappointed' THEN 1
        ELSE 0
    END AS mood_weight
FROM data
) AS mood_weights
GROUP BY overall_mood
LIMIT 1";

  $result5 = $conn->query($mood);
  if ($result5) {
    $moodResp = $result5->fetch_assoc();
    $_SESSION['final_mood'] = $moodResp['final_mood'];
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
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
          <a class="text-base text-black font-bold">Reports</a>
        </li>
      </ul>
      <ul class="ml-auto flex items-center">
        <li class="dropdown ml-3">
          <button type="button" class="dropdown-toggle flex items-center">
            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle" />
          </button>
          <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
            <li>
              <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
            </li>
            <li>
              <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
            </li>
            <li>
              <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="p-6">

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6"></div>
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

        <!-- INPUUUT CAAAAARD -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
          <div class="flex justify-center mb-4 items-start">
            <div class="font-medium">SEARCH DATA</div>
          </div>
          <div class="flex justify-center mb-4 items-start">
            <!-- DATE PICKER INPUT -->
            <form method="post" id="searchForm">
              <div class="flex flex-col space-y-4">
                <!-- Start Date Picker -->
                <label for="start_date" class="block">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">

                <!-- End Date Picker -->
                <label for="end_date" class="block">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">

                <!-- Service Input Field -->
                <label for="service" class="block">Service:</label>
                <input type="text" id="service" name="service" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">

                <!-- Training Name Input Field -->
                <label for="training_name" class="block">Training Name:</label>
                <input type="text" id="training_name" name="training_name" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-Black px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-dashed focus:bg-blue-600">SEARCH</button>
              </div>
            </form>
            <!-- printview
            <button id="exportButton">View PDF</button> -->
          </div>

        </div>

        <!-- STAT CAAAAAARD -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
          <div class="flex justify-between mb-4 items-start">
            <div class="font-medium">
              <?php

              if (empty($start_date) && empty($end_date)) {
                echo  "Showing All CSF Data";
              } else {
                $start_month = date('n', strtotime($start_date));
                $end_month = date('n', strtotime($end_date));

                if ($start_date == $end_date) {
                  echo "Showing " . date('F j, Y', strtotime($start_date)) . " CSF Data";
                } else {
                  echo "Showing " . date('F j, Y', strtotime($start_date)) . " - " . date('F j, Y', strtotime($end_date)) .
                    " CSF Data";
                }

                if ($start_month == 1 && $end_month == 3) {
                  echo "<br><i>" . ($_SESSION['quarter'] = "1st Quarter Of " . date('Y')) . "</i>";
                } elseif ($start_month == 4 && $end_month == 6) {
                  echo "<br><i>" . ($_SESSION['quarter'] = "2nd Quarter Of " . date('Y')) . "</i>";
                } elseif ($start_month == 7 && $end_month == 9) {
                  echo "<br><i>" . ($_SESSION['quarter'] = "3rd Quarter Of " . date('Y')) . "</i>";
                } elseif ($start_month == 10 && $end_month == 12) {
                  echo "<br><i>" . ($_SESSION['quarter'] = "4th Quarter Of " . date('Y')) . "</i>";
                } else {
                }
              }


              // else {
              //   echo "Showing " . date('F j, Y', strtotime($start_date)) . " to " . date('F j, Y', strtotime($end_date));
              // }

              // } else {
              //   $start_month_formatted = date('F j, Y', strtotime($start_date));
              //   $end_month_formatted = date('F j, Y', strtotime($end_date));
              //   echo $start_month_formatted . " to " . $end_month_formatted;
              // }

              ?>

            </div>
          </div>
          <!-- UPPER Parent div -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <!-- services  -->
            <div class="rounded-md border border-dashed border-gray-200 p-4">
              <div class="flex items-center mb-0.5">
                <div class="text-2xl font-semibold">
                  <?php
                  echo $total_services > 0 ? $total_services : "0";
                  ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">Services</span>
              <div>
                <table class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Loop through the array of company names and display them in the table
                    if (empty($service)) {
                      echo "<tr><td colspan='1'>No Data</td></tr>";
                    } else {
                      foreach ($service as $index => $service) {
                        echo "<tr class='" . (($index % 2 == 0) ? "bg-gray-100" : "bg-white") . " border-b'>";
                        // echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . ($index + 1) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $service . "</td>";
                        echo "</tr>";
                        // query for debugging
                        // echo "SQL Query: " . $sql . "<br>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- service end -->

            <!-- training -->
            <div class="rounded-md border border-dashed border-gray-200 p-4">
              <div class="flex items-center mb-0.5">
                <div class="text-2xl font-semibold">
                  <?php
                  echo $total_training_names > 0 ? $total_training_names : "0";
                  ?>
                </div>
                <span class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1"></span>
              </div>
              <span class="text-gray-400 text-sm">Trainings</span>
              <div>
                <table class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Loop through the array of company names and display them in the table
                    if (empty($training_name)) {
                      echo "<tr><td colspan='1'>No Data</td></tr>";
                    } else {
                      foreach ($training_name as $index => $training_name) {
                        echo "<tr class='" . (($index % 2 == 0) ? "bg-gray-100" : "bg-white") . " border-b'>";
                        // echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . ($index + 1) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $training_name . "</td>";
                        echo "</tr>";
                        // query for debugging
                        // echo "SQL Query: " . $sql . "<br>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- training end -->


            <!-- COMPANY -->
            <div class="rounded-md border border-dashed border-gray-200 p-4">
              <div class="flex items-center mb-0.5">
                <div class="text-2xl font-semibold">
                  <?php
                  echo $_SESSION['firms'] = $total_companies > 0 ? $total_companies : "0";
                  ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">Firms</span>
              <div>
                <table class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    // Loop through the array of company names and display them in the table
                    if (empty($company_names)) {
                      echo "<tr><td colspan='1'>No Data</td></tr>";
                    } else {

                      $_SESSION['firms_name'] = array();
                      foreach ($company_names as $index => $company) {
                        echo "<tr class='" . (($index % 2 == 0) ? "bg-gray-100" : "bg-white") . " border-b'>";
                        // echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . ($index + 1) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $company . "</td>";
                        echo "</tr>";
                        $_SESSION['firms_name'][] = $company;
                        // query for debugging
                        // echo "SQL Query: " . $sql . "<br>";
                      }
                    }

                    ?>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- COMPANY END -->


            <!-- SECTORS -->
            <div class="rounded-md border border-dashed border-gray-200 p-4 mt-4">
              <div class="flex items-center mt-0.5">
                <div class="text-2xl font-semibold">
                  <?php
                  echo $total_sectors > 0 ? $total_sectors : "0";
                  ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">Sectors</span>
              <div>
                <table class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr>
                      <!-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">

                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        #
                      </th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php


                    // Loop through the arrays of sectors and their counts
                    if (empty($sectors)) {
                      echo "<tr><td colspan='2'>No Data</td></tr>";
                    } else {
                      // Initialize an empty array to store the sectors and their counts
                      $sectorData = array();

                      foreach ($sectors as $index => $sector) {
                        echo "<tr class='" . (($index % 2 == 0) ? "bg-gray-100" : "bg-white") . " border-b'>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $sector['sector'] . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-light text-gray-900'>" . $sector['sector_count'] . "</td>";
                        echo "</tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- SECTORS END -->

            <!-- Returning ad first time START-->
            <div class="rounded-md border border-dashed border-gray-200 p-4 mt-4">
              <div class="flex items-center mt-0.5">
                <div class="text-2xl font-semibold">
                  <?php
                  echo $_SESSION['returning'] = $returning_customers > 0 ? $returning_customers : "0";
                  ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">Returning Clients</span>


              <div class="flex items-center mt-0.5">
                <div class="text-2xl font-semibold">
                  <?php
                  echo $_SESSION['firstTime'] = $first_time_customers > 0 ? $first_time_customers : "0";
                  ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">First Time Clients</span>
            </div>
            <!-- Returning ad first time END-->

            <!-- F+MALE AND FEMALE START -->
            <div class="rounded-md border border-dashed border-gray-200 p-4 mt-4">

              <div class="text-2xl font-semibold">
                <?php
                echo $_SESSION['totalRes'] = $total_male + $total_female;
                ?>
              </div>
              <span class="text-gray-400 text-lg ">CSF Respondents</span>


              <!-- Female -->
              <div class="flex items-center mt-2">


                <div class="text-l font-semibold">
                  <?php
                  echo $_SESSION['totalFem'] = $total_female > 0 ? $total_female : "0";
                  ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">Female Clients</span>
              <!-- MALE -->
              <div class="flex items-center mt-0.5">

                <div class="text-l font-semibold">
                  <?php echo $_SESSION['totalMel'] = $total_male > 0 ? $total_male : "0"; ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">Male Clients</span>

            </div>
            <!-- FEMALE AND FEMALE START -->

          </div>
          <!-- Upper Parent div end -->

          <!-- LOWER PART CARD SECTION -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <div class="rounded-md border border-dashed border-gray-200 p-4 mt-4">

              <div class="flex items-center mt-0.5">

                <div class="text-2xl font-semibold">
                  <?php echo $_SESSION['msme_count'] = $msme_count ?>
                </div>
              </div>
              <span class="text-gray-400 text-sm">MSMEs Assisted</span>

            </div>


          </div>

          <!-- LOWER PART CARD SECTION -->
          <button id="exportButton" class="btn btn-primary hover:bg-blue-700 text-gray py-2 px-4 rounded float-right">EXPORT DATA</button>
        </div>

      </div>

    </div>



    </div>
    </div>
  </main>
  <!-- end: Main -->

  <script src="https://unpkg.com/@popperjs/core@2"></script>

  <script src="./src/dashboard.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
  <script>
    document.getElementById('exportButton').addEventListener('click', function() {

      // Redirect to printPage.php

      // header("Location: printPage.php");
      window.location.href = 'printPage.php';
      $_SESSION['form_submitted'] = true;

    });
  </script>




</body>

</html>




<!-- EVERYTHING YOU LOSE IS A STEP YOU TAKE -TS-->