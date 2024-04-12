<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'DBRugbyFuncs.php';

$pdo = connectDB();
$name = $_POST['name'];
$pwd = $_POST['pwd'];

// Check if the user is an admin
$sql = "SELECT * FROM Players WHERE username = '$name' AND password = SHA1('$pwd') AND is_admin = '1'";
$admin_result = $pdo->query($sql);
$admin_count = $admin_result->rowCount();

if ($admin_count > 0) {
    // Admin login
    $_SESSION['admin'] = $name;
    header("Location: ./adminDashboard.php");
    exit();
} else {
    // Check if the user is a customer
    $sql = "SELECT * FROM Players WHERE username = '$name' AND password = ('$pwd')";
    $player_result = $pdo->query($sql);
    $player_count = $player_result->rowCount();
    
    if ($player_count > 0) {
        // Customer login
        $_SESSION['player'] = $name;
        header("Location: ./Scheduler.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid Username or password, Try again";
        header("Location: ./Login.php?errMsg=Incorrect Username or password");
        exit();
    }
}






