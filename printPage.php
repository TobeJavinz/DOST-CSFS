<?php
session_start();

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

// $SQD_4SD = $_SESSION['SQD_4SD'];
// $SQD_4D = $_SESSION['SQD_4D'];
// $SQD_4NAD = $_SESSION['SQD_4NAD'];
// $SQD_4A = $_SESSION['SQD_4A'];
// $SQD_SAD = $_SESSION['SQD_24SA'];

// $SQD_5SD = $_SESSION['SQD_5SD'];
// $SQD_5D = $_SESSION['SQD_5D'];
// $SQD_5NAD = $_SESSION['SQD_5NAD'];
// $SQD_5A = $_SESSION['SQD_5A'];
// $SQD_5SA = $_SESSION['SQD_5SA'];

// $_SESSION['SQD_6SD'];
// $_SESSION['SQD_6D'];
// $_SESSION['SQD_6NAD'];
// $_SESSION['SQD_6A'];
// $_SESSION['SQD_6SA'];

// $_SESSION['SQD_7SD'];
// $_SESSION['SQD_7D'];
// $_SESSION['SQD_7NAD'];
// $_SESSION['SQD_7A'];
// $_SESSION['SQD_7SA'];

// $_SESSION['SQD_8SD'];
// $_SESSION['SQD_8D'];
// $_SESSION['SQD_8NAD'];
// $_SESSION['SQD_8A'];
// $_SESSION['SQD_8SA'];

// $_SESSION['SQD_9SD'];
// $_SESSION['SQD_9D'];
// $_SESSION['SQD_9NAD'];
// $_SESSION['SQD_9A'];
// $_SESSION['SQD_9SA'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

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

<body>
    <!-- Image header -->
    <div class="header-image" style="text-align: center;">
        <img src="assets/header.png" alt="Header Image" width="500">
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
    <table class="table table-bordered" id="table">
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
    <table class="table table-bordered" id="table">
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
            <td><?php echo $SQD_1SD?></td> <!-- Strongly Disagree-->
            <td><?php echo $SQD_1D ?></td> <!--  Disgree -->
            <td><?php echo $SQD_1NAD ?></td> <!--  Neither Agree nor Agree -->
            <td><?php echo $SQD_1A ?> </td> <!--  Agree -->
            <td><?php echo $SQD_1SA ?> </td> <!--  Strongly Agree -->
            <td><?php echo $SQD_1SD + $SQD_1D + $SQD_1NAD + $SQD_1A + $SQD_1SA; ?></td> <!--  Total Responses -->
            <td><?php echo $total1 = ($SQD_1A * 4) + ($SQD_1SA * 5); ?></td> <!--  Total Score -->
            <td><?php echo $total1 / ($SQD_1A + $SQD_1SA); ?></td> <!--  Rating-->
            
        </tr>
        <tr>
            <td>SQD2. Reliability</td>
            <td>The office followed the transaction's requirements and steps based on the information provided.</td>
            <td><?php echo $SQD_2SD?></td> <!-- Strongly Disagree-->
            <td><?php echo $SQD_2D ?></td> <!--  Disgree -->
            <td><?php echo $SQD_2NAD ?></td> <!--  Neither Agree nor Agree -->
            <td><?php echo $SQD_2A ?> </td> <!--  Agree -->
            <td><?php echo $SQD_2SA ?> </td> <!--  Strongly Agree -->
            <td><?php echo $SQD_2SD + $SQD_2D + $SQD_2NAD + $SQD_2A + $SQD_2SA; ?></td> <!--  Total Responses -->
            <td><?php echo $total2 = ($SQD_2A * 4) + ($SQD_2SA * 5); ?></td> <!--  Total Score -->
            <td><?php echo $total2 / ($SQD_2A + $SQD_2SA); ?></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD3.</td>
            <td>The steps (including) payment</td>
            <td><?php echo $SQD_3SD?></td> <!-- Strongly Disagree-->
            <td><?php echo $SQD_3D ?></td> <!--  Disgree -->
            <td><?php echo $SQD_3NAD ?></td> <!--  Neither Agree nor Agree -->
            <td><?php echo $SQD_3A ?> </td> <!--  Agree -->
            <td><?php echo $SQD_3SA ?> </td> <!--  Strongly Agree -->
            <td><?php echo $SQD_3SD + $SQD_3D + $SQD_3NAD + $SQD_3A + $SQD_3SA; ?></td> <!--  Total Responses -->
            <td><?php echo $total3 = ($SQD_3A * 4) + ($SQD_3SA * 5); ?></td> <!--  Total Score -->
            <td><?php echo $total3 / ($SQD_3A + $SQD_3SA); ?></td> <!--  Rating-- -->
        </tr>
        <tr>
            <td>SQD4</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>0</td> <!-- Strongly Disagree-->
            <td>0</td> <!--  Disgree -->
            <td>0</td> <!--  Neither Agree nor Agree -->
            <td>0</td> <!--  Agree -->
            <td>0</td> <!--  Strongly Disagree -->
            <td>0</td> <!--  Total Responses -->
            <td>0</td> <!--  Total Score -->
            <td>0</td> <!--  Rating-->
        </tr>
        <tr>
            <td>SQD5</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>0</td> <!-- Strongly Disagree-->
            <td>0</td> <!--  Disgree -->
            <td>0</td> <!--  Neither Agree nor Agree -->
            <td>0</td> <!--  Agree -->
            <td>0</td> <!--  Strongly Disagree -->
            <td>0</td> <!--  Total Responses -->
            <td>0</td> <!--  Total Score -->
            <td>0</td> <!--  Rating-->
        </tr>
        <tr>
            <td>SQD6</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>0</td> <!-- Strongly Disagree-->
            <td>0</td> <!--  Disgree -->
            <td>0</td> <!--  Neither Agree nor Agree -->
            <td>0</td> <!--  Agree -->
            <td>0</td> <!--  Strongly Disagree -->
            <td>0</td> <!--  Total Responses -->
            <td>0</td> <!--  Total Score -->
            <td>0</td> <!--  Rating-->
        </tr>
        <tr>
            <td>SQD7</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>0</td> <!-- Strongly Disagree-->
            <td>0</td> <!--  Disgree -->
            <td>0</td> <!--  Neither Agree nor Agree -->
            <td>0</td> <!--  Agree -->
            <td>0</td> <!--  Strongly Disagree -->
            <td>0</td> <!--  Total Responses -->
            <td>0</td> <!--  Total Score -->
            <td>0</td> <!--  Rating-->
        </tr>
        <tr>
            <td>SQD8</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>0</td> <!-- Strongly Disagree-->
            <td>0</td> <!--  Disgree -->
            <td>0</td> <!--  Neither Agree nor Agree -->
            <td>0</td> <!--  Agree -->
            <td>0</td> <!--  Strongly Disagree -->
            <td>0</td> <!--  Total Responses -->
            <td>0</td> <!--  Total Score -->
            <td>0</td> <!--  Rating-->
        </tr>
        <tr>
            <td>Overall</td>
            <td></td>
            <td>0</td> <!-- Strongly Disagree-->
            <td>0</td> <!--  Disgree -->
            <td>0</td> <!--  Neither Agree nor Agree -->
            <td>0</td> <!--  Agree -->
            <td>0</td> <!--  Strongly Disagree -->
            <td>0</td> <!--  Total Responses -->
            <td>0</td> <!--  Total Score -->
            <td>0</td> <!--  Rating-->
        </tr>
        <!-- Add more rows as needed -->
    </table>

    <button type="button" id="printButton" onclick="printPage()" class="btn btn-primary">Print Page</button>
</body>

</html>

<?php session_unset();
session_destroy(); ?>