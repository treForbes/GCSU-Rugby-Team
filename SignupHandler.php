<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'DBRugbyFuncs.php';

$fname = fix_string($_POST['fname']);
$lname = fix_string($_POST['lname']);
$username = fix_string($_POST['username']);
$password = fix_string($_POST['pwd']);
$position = null;
$weight = null;
$email = fix_string($_POST['email']);
$phone = fix_string($_POST['phone']);
$team_id = fix_string($_POST['team']); // Get the selected team ID from the form

// Set is_admin to 0 for all new players
$is_admin = '0';

$pdo = connectDB();
$sql = "INSERT INTO Players (username, password, position, weight, email, phone_number, is_admin, team_id, first_name, last_name) 
        VALUES (:username, :password, :position, :weight, :email, :phone, :is_admin, :team_id, :fname, :lname)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'username' => $username,
    'password' => $password,
    'position' => $position,
    'weight' => $weight,
    'email' => $email,
    'phone' => $phone,
    'is_admin' => $is_admin,
    'team_id' => $team_id, // Set the team_id based on user selection
    'fname' => $fname,
    'lname' => $lname
]);

$row = $stmt->rowCount();
if ($row == 0) {
    $_SESSION['player'] = $username; // Assuming you want to use the username here
    header("Location: ./Scheduler.php");
    exit();
} else {
    header("Location: ./Login.php");
    exit();
}


function fix_string($str)
{
  if (get_magic_quotes_gpc()) $str = stripslashes($str);
  return real_escape_string($str);
}
?>

