<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $eventName = $_POST['event_name'];
    $eventDate = $_POST['event_date'];
    $eventTime = $_POST['event_time'];
    $eventDescription = $_POST['event_description'];

    // Validate form data (you can add more validation if needed)
    if (empty($eventName) || empty($eventDate) || empty($eventTime)) {
        // If any required field is empty, display error message
        $errorMessage = "All fields are required.";
    } else {
        // Insert the event into the database
        require_once 'DBRugbyFuncs.php'; // Include your database functions file
        $pdo = connectDB(); // Connect to the database

        // Prepare and execute the SQL query
        $sql = "INSERT INTO events (event_name, event_date, event_time, event_description) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$eventName, $eventDate, $eventTime, $eventDescription]);

        // Redirect back to the admin dashboard or any other page after adding the event
        header("Location: ./adminDashboard.php");
        exit();
    }
}
?>