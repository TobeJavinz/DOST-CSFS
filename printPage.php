<?php
session_start();


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
            <th colspan="4">No. of Responses per Rating Scale</th>
            <th rowspan="2">Total Responses</th>
            <th rowspan="2">Total Score*</th>
            <th rowspan="2">Rating**</th>

        </tr>
        <tr>

            <th>Strongly Agree</th>
            <th>Agree</th>
            <th>Disagree</th>
            <th>Strongly Disagree</th>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>100</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>SQD0. Responsiveness</td>
            <td>I spent a reasonable amount of time for my transaction</td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <tr>
            <td>Overall</td>
            <td></td>
            <td>10</td>
            <td>20</td>
            <td>5</td>
            <td>2</td>
            <td>37</td>
            <td>2</td>
            <td>37</td>
        </tr>
        <!-- Add more rows as needed -->
    </table>

    <button type="button" id="printButton" onclick="printPage()" class="btn btn-primary">Print Page</button>
</body>

</html>

<?php session_unset();
session_destroy(); ?>