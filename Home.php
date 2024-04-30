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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container-fluid">
    <?php
    require_once 'RugbyTeamPageFormat.php';
    if(isset($_SESSION['admin'])) {
    // User is logged in as an admin
    $arr = array("Home","About Us","Scheduler","Logout","ConTact US","OverView");
} elseif(isset($_SESSION['player'])) {
    // User is logged in as a player
    $arr = array("Home","About Us","Scheduler","Logout","ConTact US","OverView");
} else {
    // User is not logged in
    $arr = array("Home","Login", "SignUp");
}
    $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
    $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
    $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
    pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
    ?>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="photo-gallery">
                <img id="current-photo" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script src="functions.js"></script>
</body>
</html>
