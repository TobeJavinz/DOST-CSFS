<?php
session_start();

// Check if $SQD_1SD has no value and redirect to reports.php
if (!isset ($_SESSION['SQD_1SD'])) {
    header("Location: reports.php");
    exit;
}


// Retrieve the session variables
$SQD_1SD = $_SESSION['SQD_1SD'];
$SQD_1D = $_SESSION['SQD_1D'];
$SQD_1NAD = $_SESSION['SQD_1NAD'];
$SQD_1A = $_SESSION['SQD_1A'];
$SQD_1SA = $_SESSION['SQD_1SA'];

$SQD_2SD = $_SESSION['SQD_2SD'];
$SQD_2D = $_SESSION['SQD_2D'];
$SQD_2NAD = $_SESSION['SQD_2NAD'];
$SQD_2A = $_SESSION['SQD_2A'];
$SQD_2SA = $_SESSION['SQD_2SA'];

$SQD_3SD = $_SESSION['SQD_3SD'];
$SQD_3D = $_SESSION['SQD_3D'];
$SQD_3NAD = $_SESSION['SQD_3NAD'];
$SQD_3A = $_SESSION['SQD_3A'];
$SQD_3SA = $_SESSION['SQD_3SA'];

$SQD_4SD = $_SESSION['SQD_4SD'];
$SQD_4D = $_SESSION['SQD_4D'];
$SQD_4NAD = $_SESSION['SQD_4NAD'];
$SQD_4A = $_SESSION['SQD_4A'];
$SQD_4SA = $_SESSION['SQD_4SA'];

$SQD_5SD = $_SESSION['SQD_5SD'];
$SQD_5D = $_SESSION['SQD_5D'];
$SQD_5NAD = $_SESSION['SQD_5NAD'];
$SQD_5A = $_SESSION['SQD_5A'];
$SQD_5SA = $_SESSION['SQD_5SA'];

$SQD_6SD = $_SESSION['SQD_6SD'];
$SQD_6D = $_SESSION['SQD_6D'];
$SQD_6NAD = $_SESSION['SQD_6NAD'];
$SQD_6A = $_SESSION['SQD_6A'];
$SQD_6SA = $_SESSION['SQD_6SA'];

$SQD_7SD = $_SESSION['SQD_7SD'];
$SQD_7D = $_SESSION['SQD_7D'];
$SQD_7NAD = $_SESSION['SQD_7NAD'];
$SQD_7A = $_SESSION['SQD_7A'];
$SQD_7SA = $_SESSION['SQD_7SA'];

$SQD_8SD = $_SESSION['SQD_8SD'];
$SQD_8D = $_SESSION['SQD_8D'];
$SQD_8NAD = $_SESSION['SQD_8NAD'];
$SQD_8A = $_SESSION['SQD_8A'];
$SQD_8SA = $_SESSION['SQD_8SA'];

$NET_PROMOTER_1 = $_SESSION['NET_PROMOTER_1'];
$NET_PROMOTER_2 = $_SESSION['NET_PROMOTER_2'];
$NET_PROMOTER_3 = $_SESSION['NET_PROMOTER_3'];
$NET_PROMOTER_4 = $_SESSION['NET_PROMOTER_4'];
$NET_PROMOTER_5 = $_SESSION['NET_PROMOTER_5'];


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link href="./src/output.css" rel="stylesheet" />
    <style>
        /* Position the header image at the top of each page */

        .header-image {
            text-align: center;
            top: 0;
            left: 0;
            right: 0;
            margin: 20px;
            /* Center the image horizontally */
            padding: 10px;
            /* Add padding if needed */
        }

        .header-image p {
            margin: 0;
            /* Remove margin between paragraphs */
            padding: 0;
            /* Remove padding between paragraphs */
        }
    </style>
    <script>
        function printPage() {
            document.getElementById('printButton').style.display = 'none'; // Hide the button
            window.print();
            document.getElementById('printButton').style.display = 'block';
        }
    </script>
</head>

<body style="margin: 20px; margin-bottom: 50px;">
    <!-- Image header -->
    <div class="header-image" style="text-align: center; margin: 0 auto;">
        <img src="assets/header.png" alt="Header Image" width="500" style="display: block; margin: 0 auto;">
        <p><b>Customer Satisfaction Score</b></p>
        <p>Statistical Analysis of the Numerical Ratings</p>
        <p><b>
                <?php echo $_SESSION['training_name']; ?>
            </b></p>
        <p>
            <<'Address'>>
        </p>
        <p>
            <<'Date'>>
        </p>
    </div>
    <p><b>I. Count of Citizen's Charter(CC) Results</b></p>
    <table class="table table-bordered text-center" id="table">
        <tr>
            <th></th>
            <th>Responses</th>

        </tr>
        <tr>
            <td>CC1. Yes, aware before my transaction here</td>
            <td></td>

        </tr>
        <tr>
            <td>CC1. Yes, aware before my transaction here</td>
            <td></td>

        </tr>
        <tr>
            <td>CC1. N0, aware before my transaction here</td>
            <td></td>

        </tr>
    </table>

    <p><b>II. Count of SQD Results</b></p>
    <table class="table table-bordered text-center" id="table">
        <tr>
            <th colspan="2" rowspan="2">Service Quality Dimension</th>
            <th colspan="5">No. of Responses per Rating Scale</th>
            <th rowspan="2">Total Responses</th>
            <th rowspan="2">Total Score*</th>
            <th rowspan="2">Rating**</th>

        </tr>
        <tr>

            <th>Strongly Disagree</th>
            <th>Disgree</th>
            <th>Neither Agree nor Agree</th>
            <th>Agree</th>
            <th>Strongly Agree</th>
        </tr>
        <tr>
            <td>SQD1. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>
                <?php echo $SQD_1SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_1D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_1NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_1A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_1SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_1SD + $SQD_1D + $SQD_1NAD + $SQD_1A + $SQD_1SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total1 = ($SQD_1A * 4) + ($SQD_1SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total1 / ($SQD_1A + $SQD_1SA), 2); ?>
                </strong></td> <!--  Rating-->

        </tr>
        <tr>
            <td>SQD2. Reliability</td>
            <td>The office followed the transaction's requirements and steps based on the information provided.</td>
            <td>
                <?php echo $SQD_2SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_2D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_2NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_2A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_2SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_2SD + $SQD_2D + $SQD_2NAD + $SQD_2A + $SQD_2SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total2 = ($SQD_2A * 4) + ($SQD_2SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total2 / ($SQD_2A + $SQD_2SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD3.</td>
            <td>The steps (including) payment</td>
            <td>
                <?php echo $SQD_3SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_3D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_3NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_3A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_3SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_3SD + $SQD_3D + $SQD_3NAD + $SQD_3A + $SQD_3SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total3 = ($SQD_3A * 4) + ($SQD_3SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total3 / ($SQD_3A + $SQD_3SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD4</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>
                <?php echo $SQD_4SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_4D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_4NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_4A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_4SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_4SD + $SQD_4D + $SQD_4NAD + $SQD_4A + $SQD_4SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total4 = ($SQD_4A * 4) + ($SQD_4SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total4 / ($SQD_4A + $SQD_4SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD5</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>
                <?php echo $SQD_5SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_5D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_5NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_5A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_5SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_5SD + $SQD_5D + $SQD_5NAD + $SQD_5A + $SQD_5SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total5 = ($SQD_5A * 4) + ($SQD_5SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total5 / ($SQD_5A + $SQD_5SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD6</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>
                <?php echo $SQD_6SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_6D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_6NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_6A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_6SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_6SD + $SQD_6D + $SQD_6NAD + $SQD_6A + $SQD_6SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total6 = ($SQD_6A * 4) + ($SQD_6SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total6 / ($SQD_6A + $SQD_6SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD7</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>
                <?php echo $SQD_7SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_7D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_7NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_7A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_7SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $SQD_7SD + $SQD_7D + $SQD_7NAD + $SQD_7A + $SQD_7SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total7 = ($SQD_7A * 4) + ($SQD_7SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total7 / ($SQD_7A + $SQD_7SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD8</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>
                <?php echo $SQD_8SD ?>
            </td> <!-- Strongly Disagree-->
            <td>
                <?php echo $SQD_8D ?>
            </td> <!--  Disgree -->
            <td>
                <?php echo $SQD_8NAD ?>
            </td> <!--  Neither Agree nor Agree -->
            <td>
                <?php echo $SQD_8A ?>
            </td> <!--  Agree -->
            <td>
                <?php echo $SQD_8SA ?>
            </td> <!--  Strongly Agree -->
            <td>
                <?php echo $totalRes = $SQD_8SD + $SQD_8D + $SQD_8NAD + $SQD_8A + $SQD_8SA; ?>
            </td> <!--  Total Responses -->
            <td>
                <?php echo $total8 = ($SQD_8A * 4) + ($SQD_8SA * 5); ?>
            </td> <!--  Total Score -->
            <td><strong>
                    <?php echo round($total8 / ($SQD_8A + $SQD_8SA), 2); ?>
                </strong></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>Overall</td>
            <td></td>
            <td class="text-center">
                <?php
                echo $totalSD = $SQD_1SD + $SQD_2SD + $SQD_3SD + $SQD_4SD + $SQD_5SD + $SQD_6SD + $SQD_7SD + $SQD_8SD;
                ?>
            </td>

            <td>
                <?php echo $totalD = $SQD_1D + $SQD_2D + $SQD_3D + $SQD_4D + $SQD_5D + $SQD_6D + $SQD_7D + $SQD_8D; ?>
            </td> <!--  D -->
            <td>
                <?php echo $totalNAD = $SQD_1NAD + $SQD_2NAD + $SQD_3NAD + $SQD_4NAD + $SQD_5NAD + $SQD_6NAD + $SQD_7NAD + $SQD_8NAD; ?>
            </td> <!--  NAD -->

            <td>
                <?php echo $totalAgree = $SQD_1A + $SQD_2A + $SQD_3A + $SQD_4A + $SQD_5A + $SQD_6A + $SQD_7A + $SQD_8A; ?>
            </td> <!-- A-->
            <td>
                <?php
                echo $totalStronglyAgree = $SQD_1SA + $SQD_2SA + $SQD_3SA + $SQD_4SA + $SQD_5SA + $SQD_6SA + $SQD_7SA + $SQD_8SA;
                ?>
            </td> <!--  Total SA -->
            <td>
                <?php echo $totalRes * 8 ?>
            </td> <!--  overall Total respo -->

            <td>
                <?php echo $totalScore = $total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7 + $total8; ?>
            </td> <!--  OVERALL TOTAL SCORE-->

            <td><strong>
                    <?php
                    $totalResponses = $total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7 + $total8;
                    $totalAgreeSA = $totalAgree + $totalStronglyAgree;
                    $averageRating = round($totalScore / $totalAgreeSA, 2);
                    echo $averageRating;
                    ?>
                </strong> <!--  OVERALL AVERAGE RATING-->
            </td>
        </tr>
        <!-- Add more rows as needed -->
    </table>
    <p><b>III. Net Promoter Score</b></p>
    <p class="bg-gray-200 bg-opacity-100 text-sm"><i>NPS = % of Promoters(5s) - % of Defractors (0 through 3)</p>
    <p style="margin-top: 10px;">NPS1. Recommend DOST XI assistance to others</i></p>
    <table class="table table-bordered text-center" id="table">
        <tr>

            <th colspan="6">No. of Responses </th>
            <th rowspan="3">NPS</th>
        </tr>
        <tr>

            <th>Highly Unlikely</th>
            <th>Unlikely</th>
            <th>Neutral</th>
            <th>Likely</th>
            <th>Highly Likely</th>
            <th>TOTAL</th>
        </tr>
        <tr>


            <td>
                <?php echo $NET_PROMOTER_1 ?>
            </td> <!--1 -->
            <td>
                <?php echo $NET_PROMOTER_2 ?>
            </td> <!-- 2 -->
            <td>
                <?php echo $NET_PROMOTER_3 ?>
            </td> <!-- 3 -->
            <td>
                <?php echo $NET_PROMOTER_4 ?>
            </td> <!-- 4 -->
            <td>
                <?php echo $NET_PROMOTER_5 ?>
            </td> <!-- 5 -->
            <td rowspan="2">
                <?php echo $NET = $NET_PROMOTER_1 + $NET_PROMOTER_2 + $NET_PROMOTER_3 + $NET_PROMOTER_4 + $NET_PROMOTER_5; ?>
            </td>


        </tr>
        <tr>


            <?php
            if ($NET_PROMOTER_1 == 0 && $NET_PROMOTER_2 == 0) {
                $percent12 = 0;
            } else {
                $percent12 = round(($NET_PROMOTER_1 + $NET_PROMOTER_2) / $NET * 100, 2);
            }
            if ($NET_PROMOTER_3 == 0) {
                $percent3 = 0;
            } else {
                $percent3 = round($NET_PROMOTER_3 / $NET * 100, 2);
            }
            if ($NET_PROMOTER_4 == 0) {
                $percent4 = 0;
            } else {
                $percent4 = round($NET_PROMOTER_4 / $NET * 100, 2);
            }
            if ($NET_PROMOTER_5 == 0) {
                $percent5 = 0;
            } else {
                $percent5 = round($NET_PROMOTER_5 / $NET * 100, 2);
            }
            ?>

            <td colspan="2"><strong>
                    <?php echo $percent12 . '%' ?><strong></td>
            <td><strong>
                    <?php echo $percent3 . '%' ?><strong></td>
            <td><strong>
                    <?php echo $percent4 . '%' ?>
                </strong></td>
            <td><strong>
                    <?php echo $percent5 . '%' ?>
                </strong></td>
            <td><strong>
                    <?php echo $NPS = max(0, $percent5 - ($percent12 + $percent3)) . '%' ?>
                </strong></td>

        </tr>
    </table>


    <p style="margin-top: 10px;"><i>NPS2. Recommend similar assistance availed from the following agencies: </i></p>
    <table class="table table-bordered text-center" id="table">
        <tr>
            <th rowspan="2">Name of Agency</th>
            <th colspan="6">No. of Responses </th>
            <th rowspan="2">NPS</th>
        </tr>
        <tr>

            <th>Highly</th>
            <th>Unlikely</th>
            <th>Neutral</th>
            <th>Likely</th>
            <th>Highly Likely</th>
            <th>TOTAL</th>
        </tr>
        <tr>
            <td>Ateneo</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>

    </table>

    <p><b>IV. Summary of Information Gathered</b></p>

    <table class="table table-bordered text-center" id="table">
        <tr>
            <td>Type Of Training</td>
            <td>No. Of Respondents</td>
        </tr>
        <tr>
            <td>Data 1</td>
            <td>Data 2</td>
        </tr>
        <!-- Add more rows as needed -->
    </table>





    <button type="button" id="printButton" onclick="printPage()"
        class="btn bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded float-right">Print Page</button>
</body>

</html>

<?php session_unset();
session_destroy(); ?>