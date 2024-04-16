<?php
 include "session_auth.php";


if (isset ($_GET["UserID"])) {
    $UserID = $_GET["UserID"];

    require 'DBConn.php';

    // Establish database connection
    $conn = connect_to_database();

    $sql = "DELETE FROM data WHERE ServiceID=$UserID";
    $conn->query($sql);

}

header("location: /DOST-CSFS/tables.php");
exit;
