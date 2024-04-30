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
          <h1>About Us</h1>
          <p>Add info here.</p>
        </div>
      </div>
    </div>
  </div>  

  <script src="functions.js"></script> 
</body>
</html>
