<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require_once 'RugbyTeamPageFormat.php';
  //   if(isset($_SERVER['player'])){
  //   $arr=array("Home","About Us","Scheduler","Logout","Sign Up","ConTact US","OverView");
  // } else{
  //   $arr=array("Home","About Us","Scheduler","Login","Sign Up","ConTact US","OverView");
  // }
  $arr=array("Home","About Us","Scheduler","Login","Sign Up","Contact US","OverView");
  pageHeader("Home","./images/download.png",$arr);
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

