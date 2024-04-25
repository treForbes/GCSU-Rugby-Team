<?php
// Include necessary files and establish a database connection
require_once 'DBRugbyFuncs.php';
$pdo = connectDB();

// Query events from the database
$sql = "SELECT event_name AS title, event_date AS start FROM events WHERE approval_status = 'approved'";
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return events data as JSON
header('Content-Type: application/json');
echo json_encode($events);
?>
