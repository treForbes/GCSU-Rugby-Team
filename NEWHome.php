<<<<<<< HEAD
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .center-text {
            text-align: center;
        }
        .footer-links {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }
        /* Custom CSS for image size */
        .ptime-img {
            width: 100%; /* Adjust the width as needed */
            height: auto;
        }
    </style>
</head>
<body>

<?php
require_once 'RugbyTeamPageFormat.php';

// Navigation links
$navLinks = array(
    "Home", 
    "About Us", 
    "Scheduler", 
    "Login",
    "Sign Up", 
    "Contact US", 
    "OverView"
);

// Display header
pageHeader("Home", "./images/download.png", $navLinks);
?>

<h1 class="center-text">Georgia College & State University Rugby Team</h1>

<!-- Add the new image to the left -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="./images/ptime.png" alt="Ptime Image" class="img-fluid ptime-img">
        </div>
        <div class="col-md-9">
            <!-- Add content here if needed -->
        </div>
    </div>
</div>

<footer style="background-color: #3498db; padding: 20px; margin-top: 20px; text-align: left;">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                foreach ($navLinks as $link) {
                    echo "<a href=\"$link.php\" class=\"footer-links\">$link</a>";
                }
                ?>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


=======
<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        
    </style>
  </head>
  <body>
  <div style="height:auto; width:auto;">



  
    <?php
  
    require_once 'RugbyTeamPageFormat.php';
  //   if(isset($_SERVER['player'])){
  //   $arr=array("Home","About Us","Scheduler","Logout","Sign Up","ConTact US","OverView");
  // } else{
  //   $arr=array("Home","About Us","Scheduler","Login","Sign Up","ConTact US","OverView");
  // }
  $arr=array("Home","Overview","Scheduler","About Us","Contact Us","Login","Sign Up");
  $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
  $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
  $testint=0;
  $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
  pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
  ?>
  
   

  </div>   
</body>
</html>
>>>>>>> waiting-for-review
