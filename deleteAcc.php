<?php
 include "session_auth.php";


if (isset ($_GET["UserID"])) {
    $UserID = $_GET["UserID"];

    require 'DBConn.php';

    // Establish database connection
    $conn = connect_to_database();

    $sql = "DELETE FROM user_cred WHERE UserID=$UserID";
    $conn->query($sql);

}

header("location: /DOST-CSFS/manageAcc.php");
exit;
