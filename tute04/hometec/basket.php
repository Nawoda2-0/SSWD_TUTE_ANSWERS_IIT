<?php

session_start();

include("db.php");

$pagename = "Smart Basket";             //Create and populate a variable called $pagename
echo "<link rel = stylesheet type=text/css href=mystylesheet.css>";

echo "<title>" . $pagename . "</title>";

echo "<body>";

include("headfile.html");          //include header layout file

echo "<h4>" . $pagename . "</h4>";  //display name of the page on the web page

//capture the ID of selected product using the POST method and the $_POST superglobal variable
//and store it in a new local variable called $newprodid

$newprodid = $_POST['h_prodid'];

//capture the required quantity of selected product using the POST method and $_POST superglobal variable
//and store it in a new local variable called $reququantity

$reququantity = $_POST['p_quantity'];

//Display id of selected product
echo "<p>Id of selected product: ".$newprodid;
//Display quantity of selected product
echo "<br>Quantity of selected product: ".$reququantity;

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity
$_SESSION['basket']['$newprodid']=$reququantity;
echo "<p>1 item added</p>";


include ("footfile.html");

echo "</body>"

?>
