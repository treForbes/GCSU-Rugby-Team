<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div style="height:auto; width:auto;">
    <?php
        // figure out styling for the header/footer
        require_once 'RugbyTeamPageFormat.php';
     if(isset($_SERVER['player'])){
   $arr=array("Home","About Us","Scheduler","Logout","ConTact US","OverView");
 } else{
 $arr=array("Home","About Us","Scheduler","Login", "SignUp","ConTact US","OverView");
 }

        $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   
        $pageArr= explode("/",$pageURI); 
        $testint=0;
        $currentPage  = $pageArr[count($pageArr)-1]; 
        pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
    ?>
    
    <div class="container">
        <h2>Contact Us</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <div class="contact-details">
                        <h3>Men's Rugby Team President</h3>
                        <p>Jacob Phillips</p>
                        <p>Phone: <span id="mens_president_phone">+1(770) 533-0223</span></p>
                        <img src="./images/bobcats_logo.jpg" alt="Men's Rugby Team President" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <div class="contact-details">
                        <h3>Men's Rugby Team Vice President</h3>
                        <p>Harrison Smy</p>
                        <p>Phone: <span id="mens_vp_phone">+1(770) 925-5331</span></p>
                        <img src="./images/bobcats_logo.jpg" alt="Men's Rugby Team Vice President" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <div class="contact-details">
                        <h3>Women's Rugby Team President</h3>
                        <p>Ciara</p>
                        <p>Phone: <span id="womens_president_phone">+1(770) 235-5778</span></p>
                        <img src="./images/bobcats_logo.jpg" alt="Women's Rugby Team President" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <div class="contact-details">
                        <h3>Women's Rugby Team Vice President</h3>
                        <p>Sydney Joubert</p>
                        <p>Phone: <span id="womens_vp_phone">+1(504) 508-9017</span></p>
                        <img src="./images/bobcats_logo.jpg" alt="Women's Rugby Team Vice President" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
