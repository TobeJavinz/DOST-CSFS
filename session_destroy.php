<?php
// Start the session
session_start();
// Destroy the session
unset($_SESSION['name']);
unset($_SESSION['login']);



header("Location: dashboard.php");

