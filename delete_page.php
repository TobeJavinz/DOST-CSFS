<?php


if (isset ($_GET["ServiceID"])) {
    $ServiceID = $_GET["ServiceID"];

    require 'DBConn.php';

    // Establish database connection
    $conn = connect_to_database();

    $sql = "DELETE FROM data WHERE ServiceID=$ServiceID";
    $conn->query($sql);


}

header("location: /DOST-CSFS/tables.php");
exit;
