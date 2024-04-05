<?php 
function pageHeader($title, $logo, $itemArray)
{
    echo "<div style=\"background-color: #3498db; padding: 20px;\">";
    echo "<img src=\"$logo\" alt=\"$logo\" width=\"150\" height=\"150\">";
    foreach($itemArray as $item)
    {
        $headerLink = $item . ".php";
        echo "<a href=\"$headerLink\" style=\"color: white; text-decoration: none; margin-left: 20px;\">$item</a>";
    }
    echo "</div>";
}
?>
