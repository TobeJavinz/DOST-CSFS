<?php
session_start();

// Check if user is not authenticated, redirect to login page
if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit;
}

