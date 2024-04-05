<?php 
function pageHeader($title, $logo, $itemArray)
{
    echo "<img src=\"$logo\" alt=\"$logo\" width=\"150\" height=\"150\">";
    foreach($itemArray as $item)
    {
        $headerLink = $item . ".php";
        echo "<a href=\"$headerLink\"><span class=\"m-5\"></span>$item</a>";
    }
    echo "<hr>";
}
?>
