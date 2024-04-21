<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    require_once 'RugbyTeamPageFormat.php';
    $arr=array("Home","Overview","Scheduler","About Us","Contact Us","Login","SignUp");
    $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
    $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
    $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
    pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
    ?>
    <div class="row">
        <div class="col-md-6">
            <h2>Add Event</h2>
            <!-- Form for adding events -->
            <form action="add_event.php" method="POST">
                <!-- Add your form fields here -->
                <button type="submit" class="btn btn-primary">Add Event</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Approve Events</h2>
            <!-- List of events to approve -->
            <!-- You can replace this with your actual logic for approving events -->
            <p>No events to approve</p>
        </div>
    </div>
</div>
</body>
</html>