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
if(isset($_SESSION['player'])){
        $arr=array("Home","Overview","Scheduler","About Us","Contact Us","Logout");
}else{
    $arr=array("Home","Overview","Scheduler","About Us","Contact Us","Login","SignUP");
}
  $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
  $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
  $testint=0;
  $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
  pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);


  //make html rough draft, make it be echoed via php, make signuphandler, done????
  /*
    Necessary Inputs:
      1)First Name
      2)Last Name
      3)student email how to verify this?
      4)Password 
      5)Confirm Password
      6)GCID
      7)Which team are they on

      -1)GCID????
  */
  
    echo "<div class=\"container-fluid\">";
 
  
echo "
<div class=\"container\">
    <form action=\"./SignupHandler.php\" method=\"post\" onsubmit=\"event.preventDefault(); validateSignup()\">
      <label class=\"form-label\" for=\"fname\">First Name</label>
      <input class=\"form-control\" placeholder=\"First Name\" type=\"text\" Id=\"fname\" name=\"fname\" onblur=\"validateFirstName(this)\">
      <p id=\"fnamemsg\"></p>

      <label class=\"form-label\" for=\"lname\">Last Name</label>
      <input class=\"form-control\" placeholder=\"Last Name\" type=\"text\" Id=\"lname\" name=\"lname\" onblur=\"validateName(this)\">
      <p id=\"lnamemsg\"></p>

      <label class=\"form-label\" for=\"email\">Student Email</label>
      <input class=\"form-control\" placeholder=\"firstname.lastname@bobcats.gcsu.edu\" type=\"text\" Id=\"email\" name=\"email\" aria-descirbedby=\"emaildescription\" onblur=\"validateEmail(this)\">
      <p id=\"emailmsg\"></p>

      <label class=\"form-label\" for=\"password1\">Password</label>
      <input class=\"form-control\" placeholder=\"Password\" type=\"text\" Id=\"password1\" name=\"password1\" aria-descirbedby=\"passworddescription1\" onblur=\"validatePassword(this)\">
      <div id=\"passworddescription1\" class=\"form-text\">
        Your password must contain at least one uppercase letter, lowercase letter, number, and special character
      </div> 
      <p id=\"password1msg\"></p>


      <label class=\"form-label\" for=\"password2\">Confirm Password</label>
      <input class=\"form-control\" placeholder=\"Password\" type=\"text\" Id=\"password2\" name=\"password2\" aria-descirbedby=\"passworddescription2\" onblur=\"validateConfirmPassword(this)\">
      <div id=\"passworddescription2\" class=\"form-text\">
      <p id=\"password2msg\"></p>
      
      <label class=\"form-label\" for=\"gcid\">GCID</label>
      <input class=\"form-control\" placeholder=\"Password\" type=\"text\" Id=\"gcid\" name=\"gcid\" aria-descirbedby=\"gciddescription\" onblur=\"validatGCID(this)\">
      <div id=\"gciddescription\" class=\"form-text\"></div>
      <p id=\"gcidmsg\"></p>

      <label class=\"form-label\" for=\"team\">Select which team you are on</label>
      <select class=\"form-select\" id=\"team\" name=\"team\" aria-label=\"team\" onblur=\"preventDefault(this)\">
        <option selected>Select a Team</option>
        <option value=\"men\">Men's Rugby Team</option>
        <option value=\"women\">Women's Rugby  Team</option>d
      </select>

      <input class=\"button btn btn-outline-dark\" type=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit\" >
     
      </div> ";
           
?>
      
<scipt type="text/javascript" src="./js/validate.js"></script>
  </div>   
</body>
</html>