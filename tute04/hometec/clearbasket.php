<?php
session_start();
include ("db.php");
$pagename = "Clear Smart Basket";             //Create and populate a variable called $pagename
echo "<link rel = stylesheet type=text/css href=mystylesheet.css>";

echo "<title>" . $pagename . "</title>";

echo "<body>";

include("headfile.html");          //include header layout file

echo "<h4>" . $pagename . "</h4>";  //display name of the page on the web page

unset($_SESSION['basket']);
echo "Your basket has been cleared";

include ("footfile.html");

echo "</body>"

?>
