<?php
// Include necessary files and establish a database connection
require_once 'DBRugbyFuncs.php'; // Adjust the path as needed

try {
    // Connect to the database
    $pdo = connectDB();

    // Query approved events from the database
    $sql = "SELECT * FROM events WHERE approval_status = 'approved'";
    $stmt = $pdo->query($sql);
    $approvedEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format events data for FullCalendar
    $formattedEvents = [];
    foreach ($approvedEvents as $event) {
        // Format event start date-time string (assuming event_date and event_time are separate fields)
        $startDateTime = $event['event_date'] . 'T' . $event['event_time'];

        // Add event to formatted events array
        $formattedEvents[] = [
            'id' => $event['event_id'],
            'title' => $event['event_name'],
            'start' => $startDateTime, // Use formatted start date-time string
            'description' => $event['event_description'], // Optionally, include description
        ];
    }

    // Output formatted events data as JSON
    echo json_encode($formattedEvents);
} catch (PDOException $e) {
    // Database error
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
