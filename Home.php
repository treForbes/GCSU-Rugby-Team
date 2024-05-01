<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <?php
            require_once 'NEWRugbyTeamPageFormat.php';
            $arr=array("Home","Login","Sign Up");
            $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the user is on
            $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
            $testint=0;
            $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
            pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
        ?>
    </header>
  
    <div class="container">
        <div class="row">
            <div class="col-md-8"> <!-- Increased the column size to 8 -->
                <div class="photo-gallery">
                    <img id="current-photo" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-4"> <!-- Reduced the column size to 4 -->
                <div class="overview-section">
                    <h1>Welcome to the GCSU Bobcat Rugby Club (BRC)!</h1>
                    <p>As of current, the rugby season is currently out. Please check back for more information during the year!</p>
                </div>
                <div class="follow-us">
                    <h2>Follow Us:</h2>
                    <a href="https://instagram.com/brcgcsu">
                        <p>General Instagram</p>
                    </a>

                    <a href="https://instagram.com/wbrcgcsu">
                        <p>Women's Rugby Instagram</p>
                    </a>
                </div>
            </div>
        </div>
    </div>  

    <script src="functions.js"></script> 
</body>
</html>
