<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'DBRugbyFuncs.php';

$pdo = connectDB();
$name = $_POST['name'];
$pwd = $_POST['pwd'];

// Check if the user is an admin
$sql = "SELECT * FROM Players WHERE username = ? AND password = SHA1(?) AND is_admin = '1'";
$admin_stmt = $pdo->prepare($sql);
$admin_stmt->execute([$name, $pwd]);
$admin_count = $admin_stmt->rowCount();

if ($admin_count > 0) {
    // Admin login
    $_SESSION['admin'] = $name;
    header("Location: ./adminDashboard.php");
    exit();
} else {
    // Check if the user is a customer
    $sql = "SELECT * FROM Players WHERE username = ? AND password = ?";
    $player_stmt = $pdo->prepare($sql);
    $player_stmt->execute([$name, $pwd]);
    $player_count = $player_stmt->rowCount();
    
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
?>


