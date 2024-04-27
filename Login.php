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
      .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        .login-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        
    </style>
  </head>
  <body>
  <div style="height:auto; width:auto;">



  
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
    $arr = array("Home","About Us","Scheduler","Login", "SignUp","ConTact US","OverView");
}

  $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
  $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
  $testint=0;
  $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
  pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
  ?>
  <div class="login-form">
    <h5 class="login-form-title">Login</h5>
    <form action="./RLoginHandler.php" method="POST">
        <label for="name">User Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd" required>
        <button type="submit">Login</button>
    </form>
</div>
  
   

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>
