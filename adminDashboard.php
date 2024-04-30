<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files and establish a database connection
require_once 'RugbyTeamPageFormat.php';
require_once 'DBRugbyFuncs.php';
$pdo = connectDB();

// Check if the form is submitted for approving events
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve_events'])) {
    // Retrieve the list of event IDs to approve from the form data
    $approvedEventIds = $_POST['approve_events'];

    // Update the approval status of each selected event in the database
    foreach ($approvedEventIds as $eventId) {
        $sql = "UPDATE events SET approval_status = 'approved' WHERE event_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$eventId]);
    }

    // Redirect back to the admin dashboard after approving events
    header("Location: ./AdminDashboard.php");
    exit();
}

// Query all events from the database
$sql = "SELECT * FROM events";
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container-fluid">
    <?php
    // Display page header
    $arr = array("Home", "Overview", "Scheduler", "About Us", "Contact Us","Logout");
    $pageURI = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $pageArr = explode("/", $pageURI);
    $currentPage = $pageArr[count($pageArr) - 1];
    pageHeader("Home", "./images/GCSURugbyClub.png", $arr, $currentPage);
    ?>

    <div class="row">
        <div class="col-md-6">
            <!-- Add Event Section -->
            <h2>Add Event</h2>
            <form action="add_event.php" method="POST">
                <!-- Add your form fields here -->
                <button type="submit" class="btn btn-primary">Add Event</button>
            </form>
        </div>
        <div class="col-md-6">
            <!-- Approve Events Section -->
            <h2>All Events</h2>
            <?php if (!empty($events)) : ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($events as $event) : ?>
                            <tr>
                                <td><?php echo $event['event_name']; ?></td>
                                <td><?php echo $event['event_date']; ?></td>
                                <td><?php echo $event['event_time']; ?></td>
                                <td><?php echo $event['event_description']; ?></td>
                                <td>
                                    <?php if ($event['approval_status'] === 'pending') : ?>
                                        <input type="checkbox" name="approve_events[]" value="<?php echo $event['event_id']; ?>">
                                    <?php else : ?>
                                        <span class="text-success">Approved</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (count($events) > 0) : ?>
                        <button type="submit" class="btn btn-primary">Approve Selected</button>
                    <?php endif; ?>
                </form>
            <?php else : ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>




