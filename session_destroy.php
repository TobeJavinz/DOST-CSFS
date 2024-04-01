<?php
// Start the session
session_start();
// Destroy the session
session_unset();



header("Location: dashboard.php");

