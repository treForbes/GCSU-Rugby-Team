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
  $arr=array("Home","Overview","Scheduler","About Us","Contact Us","Login","SignUp");
  $pageURI=  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];   //Determines which page the use is on
  $pageArr= explode("/",$pageURI); //At this point, '$pageURI' looks like this: "documents/code/Home.php"
  $testint=0;
  $currentPage  = $pageArr[count($pageArr)-1]; //this just selects the file name. E.g. "Home.php"
  pageHeader("Home","./images/GCSURugbyClub.png",$arr, $currentPage);
  ?>
  <div class="container-fluid">
   
        <header class="calendar-header row">
            <p class="calendar-current-date col"></p>
            <div class="calendar-navigation col">
                <span id="calendar-prev"
                      class="material-symbols-rounded">
                      &lsaquo;
                </span>
                <span id="calendar-next"
                      class="material-symbols-rounded">
                      &rsaquo;
                </span>
            </div>
        </header>

 
        <div class="calendar-body">
            <ul class="calendar-weekdays row">
                <li class="col">Sun</li>
                <li class="col">Mon</li>
                <li class="col">Tue</li>
                <li class="col">Wed</li>
                <li class="col">Thu</li>
                <li class="col">Fri</li>
                <li class="col">Sat</li>
            </ul>
            <ul class="calendar-dates "></ul>
        </div>
    </div>
  
   

  </div>   

  <script >
  let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();
 
const day = document.querySelector(".calendar-dates");
 
const currdate = document
    .querySelector(".calendar-current-date");
 
const prenexIcons = document
    .querySelectorAll(".calendar-navigation span");
 
// Array of month names
const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];
 
// Function to generate the calendar
const manipulate = () => {
 
    // Get the first day of the month
    let dayone = new Date(year, month, 1).getDay();
 
    // Get the last date of the month
    let lastdate = new Date(year, month + 1, 0).getDate();
 
    // Get the day of the last date of the month
    let dayend = new Date(year, month, lastdate).getDay();
 
    // Get the last date of the previous  month
    let monthlastdate = new Date(year, month, 0).getDate();
 
    //an str array to hold all of the dates within a month
    let litArray= Array();
    
    // Variable to store the generated calendar HTML
    let lit = "";
 
    // Loop to add the last dates of the previous month
    for (let i = dayone; i > 0; i--) {
        litArray.push(`<li class="inactive col">${monthlastdate - i + 1}<br><div>asdf</div</li>`);
    }
 
    // Loop to add the dates of the current month
    for (let i = 1; i <= lastdate; i++) {
 
        // Check if the current date is today
        let isToday = i === date.getDate()&& month === new Date().getMonth()&& year === new Date().getFullYear()? "active" : "";
        litArray.push(`<li class="${isToday} col">${i}</li>`);
    }
 
    // Loop to add the first dates of the next month
    for (let i = dayend; i < 6; i++) {
        litArray.push(`<li class="inactive col">${i - dayend + 1}</li>`);
    }
 
    // Update the text of the current date element 
    // with the formatted current month and year
    currdate.innerText = `${months[month]} ${year}`;

    //
    for(let x=0; x<5;x++)
    {
        lit+=`<div class="row">`
        for(let i =0; i<7;i++)
        {
            lit+=litArray.pop();
        }
        lit+='</div>'
    }
    // update the HTML of the dates element 
    // with the generated calendar
    day.innerHTML = lit;
}
 
manipulate();
 
// Attach a click event listener to each icon
prenexIcons.forEach(icon => {
 
    // When an icon is clicked
    icon.addEventListener("click", () => {
 
        // Check if the icon is "calendar-prev"
        // or "calendar-next"
        month = icon.id === "calendar-prev" ? month - 1 : month + 1;
 
        // Check if the month is out of range
        if (month < 0 || month > 11) {
 
            // Set the date to the first day of the 
            // month with the new year
            date = new Date(year, month, new Date().getDate());
 
            // Set the year to the new year
            year = date.getFullYear();
 
            // Set the month to the new month
            month = date.getMonth();
        }
 
        else {
 
            // Set the date to the current date
            date = new Date();
        }
 
        // Call the manipulate function to 
        // update the calendar display
        manipulate();
    });
});
  </script>
</body>
</html>