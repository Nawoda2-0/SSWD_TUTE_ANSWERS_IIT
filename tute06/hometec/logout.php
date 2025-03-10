<?php

session_start();

$pagename = "Template";             //Create and populate a variable called $pagename
echo "<link rel = stylesheet type=text/css href=mystylesheet.css>";

echo "<title>" . $pagename . "</title>";

echo "<body>";

include("headfile.html");          //include header layout file
include("detectlogin.php");          //include header layout file

echo "<h4>" . $pagename . "</h4>";  //display name of the page on the web page

echo "<p> Thank you, ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
unset($_SESSION);
session_destroy();
echo "<br><p>You are now logged out</p>";


include ("footfile.html");

echo "</body>"

?>
