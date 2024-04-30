<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is not an admin, redirect to another page or display an error message
if (!isset($_SESSION['admin'])) {
    // Redirect user to another page or display an error message
    header("Location: access_denied.php"); // Redirect to access denied page
    exit();
}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container-fluid">
    <h2>Add Event</h2>
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <form action="./evenHand.php"  method="post">

    <div class="mb-3">
        <label for="eventName" class="form-label">Event Name</label>
        <input type="text" class="form-control" id="eventName" name="event_name" required>
    </div>
    <div class="mb-3">
        <label for="eventDate" class="form-label">Event Date</label>
        <input type="date" class="form-control" id="eventDate" name="event_date" required>
    </div>
    <div class="mb-3">
        <label for="eventTime" class="form-label">Event Time</label>
        <input type="time" class="form-control" id="eventTime" name="event_time" required>
    </div>
    <div class="mb-3">
        <label for="eventDescription" class="form-label">Event Description</label>
        <textarea class="form-control" id="eventDescription" name="event_description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
</body>
</html>


