<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search by Name </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the user is not an admin, redirect to another page or display an error message
if (!isset($_SESSION['admin'])) {
    // Redirect user to another page or display an error message
    header("Location: access_denied.php"); // Redirect to access denied page
    exit();
}
require_once 'RugbyTeamPageFormat.php';
require_once 'DBRugbyFuncs.php';
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
    $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
    pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);

    
echo "</div>";
if(isset($_GET['errMsg']))
{
    $m =$_GET['errMsg'];
    echo "<h3 class=\"alert alert-warning\">$m</h3>";
}
?>
<h2 class="text-center"> Search By Event Name </h2>
<br>
<div class="container d-flex justify-content-center">
    <div class ="form-floating brWrap">
        <input type="text" class ="inWidth form-control text-center" placeholder="Pizza Name:" id="name" name="name" onkeyup="showName(this)" required>
        <label for ="name" class="text-center">Event Name: </label>
    </div>

<div id="info" class="text-center">
    
</div>

<script type="text/javascript" src="./js/search.js"></script>
<script type="text/javascript">
async function showName(id) 
{
    let name=id.value;
    if(name.length<1)
    {
         document.getElementById('info').innerHTML="";
    }
    else
    {
    let str=await fetchNameAjax(id);
    if(str === undefined)
    {
        str="";
    }
    document.getElementById('info').innerHTML= str;
    // body...
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</body>
</html>


