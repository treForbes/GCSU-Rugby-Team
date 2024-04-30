<?php
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['player'])) {
    // Redirect user to login page or display an error message
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop further execution
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <header>
    <?php
    require_once 'NEWRugbyTeamPageFormat.php';
    $arr=array("Home","Overview","Scheduler","About Us","Contact Us","Login","Sign Up");
    $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the user is on
    $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
    $testint=0;
    $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
    pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
    ?>
  </header>
  
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="photo-gallery">
          <img id="current-photo" class="img-fluid">
        </div>
      </div>
      <div class="col-md-6">
        <div class="overview-section">
          <h1>Overview</h1>
          <p>Rugby is a dynamic team sport that originated in England in the 19th century.</p>
          <h2>How to play:</h2>
          <p>Two teams of around 15 players each compete. Forwards focus on ball possession, while backs emphazie speed and scoring. Points are scored through tries (5 points), conversions (2 points), pentalty kicks (3 points), and drop goals (3 points).</p>
          <h2>Rules:</h2>
          <ul class="bullet-points">
            <li>Passing is allowed in any direction except forward.</li>
            <li>Tackling is fundamental; players must release the ball when tackled.</li>
            <li>Offside rules apply.</li>
            <li>Kicking forward is permitted, but possession must be maintained.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>  

  <script src="functions.js"></script> 
</body>
</html>
