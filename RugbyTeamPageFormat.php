<?php 
function pageHeader($title, $logo, $itemArray,$activepage)
{
    //I'm copying the color scheme from the official GCSU website. 
    //Color values are as follows:
    //Green=#005028, Gold=#BEA96F, White=#FFFFFF (just put "white" when choosing this).

    
 
    echo "<div class=\"container-fluid text-center\" style=\"background-color:#005028; \">"; //begin top div
        echo "<div class=\"row   \">";
            echo "<div style=\"\" class=\"col col-2 \">";
                echo "<img src=\"$logo\" alt=\"$logo\" class=\"img-fluid\">"; 
            echo "</div>";
            echo "<div style=\"\" class=\"col \"></div>";
           
            echo "<div style=\"\" class=\"col col-auto text-center justfy-center\">";
                echo "<p style=\"color:white;\" class=\"fs-1 text-center \">GCSU Rugby Team Events</p>";
            echo "</div>";
            echo "<div style=\"\" class=\"col \"></div>";
            echo "<div style=\"\" class=\"col col-2\"></div>";
            
        echo "</div>"; 
    echo "</div>";   


    echo "<nav  style=\"border-color:#005A2D; border-style: solid none solid none; border-thickness:2px 0 0 0;   background-color:#005028;\" class = \"navbar navbar-expand-lg navbar \" data-bs-theme=\"dark\">";
    echo "<div class\"container-fluid\">";
    echo "<div class =\"navbar-nav\">";
    foreach($itemArray as $item)
    {
        $headerLink = $item . ".php";
       

        //

        if($headerLink==$activepage)// This is supposed to generate the link in the navbar as "active" if its the page you're on, but its bugged, will fix later
        {
            echo "<a class =\"nav-link active\" aria-current=\"page\" href=\"$headerLink\">$item</a>";
        }
        else
        {
           echo "<a  class =\"nav-link \"  href=\"$headerLink\">$item</a>";
        } 
        
    }
    
    echo "</div></div></div></nav>";//closes out all of the markup
}
?>