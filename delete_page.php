<?php


if (isset($_GET["ServiceID"])) {
    $ServiceID = $_GET["ServiceID"];

    require 'conn.php';

    // Establish database connection
    $conn = connect_to_database();

    $sql = "DELETE FROM testing WHERE ServiceID=$ServiceID";
    $conn->query($sql);


}

header("location: /DOST-CSFS/tables.php");
exit;
