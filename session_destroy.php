<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect to index.php or any other page after logout
header("Location: index.php");
exit;
