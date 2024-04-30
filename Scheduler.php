<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['player'])) {
    // Redirect user to login page or display an error message
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop further execution
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css" rel="stylesheet">
    <style>
        
    </style>
  </head>
  <body>
  <div style="height:auto; width:auto;">
  
    <?php
  
    require_once 'RugbyTeamPageFormat.php';
    if(isset($_SESSION['admin'])) {
    // User is logged in as an admin
    $arr = array("Home","About Us","Scheduler","Logout","ConTact US","OverView", "eventNames", "AdminDashboard");
} elseif(isset($_SESSION['player'])) {
    // User is logged in as a player
    $arr = array("Home","About Us","Scheduler","Logout","ConTact US","OverView");
} else {
    // User is not logged in
    $arr = array("Home","About Us","Scheduler","Login", "SignUp","ConTact US","OverView");
}
  $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
  $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
  $testint=0;
  $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
  pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
  ?>
  <div id="calendar"></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: './events.php',
            eventDidMount: function (info) {
                console.log('Event:', info.event);
            }
        });
        calendar.render();
        
        // Log events data after rendering
        console.log('Events:', calendar.getEvents());
    });
</script>

</body>
</html>
