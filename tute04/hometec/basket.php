<?php

session_start();

include("db.php");

$pagename = "Smart Basket";             //Create and populate a variable called $pagename
echo "<link rel = stylesheet type=text/css href=mystylesheet.css>";

echo "<title>" . $pagename . "</title>";

echo "<body>";

include("headfile.html");          //include header layout file

echo "<h4>" . $pagename . "</h4>";  //display name of the page on the web page

//if the value of the product id to be deleted (which was posted through the hidden field) is set
if(isset($_POST['del_prodid']))
{
    //capture the posted product id and assign it to a local variable $delprodid
    $delprodid = $_POST['del_prodid'];
    //unset the cell of the session for this posted product id variable
    unset($_SESSION['basket'][$delprodid]);
    //display that one item removed from the basket
    echo "<p>1 item removed</p>";
}

if(isset($_POST['h_prodid']))
{

    //capture the ID of selected product using the POST method and the $_POST superglobal variable
    //and store it in a new local variable called $newprodid
    

    $newprodid = $_POST['h_prodid'];

    //capture the required quantity of selected product using the POST method and $_POST superglobal variable
    //and store it in a new local variable called $reququantity

    $reququantity = $_POST['p_quantity'];

    //Display id of selected product
    //echo "<p>Id of selected product: ".$newprodid;
    //Display quantity of selected product
    //echo "<br>Quantity of selected product: ".$reququantity;

    //create a new cell in the basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity
    $_SESSION['basket'][$newprodid]=$reququantity;
    echo "<p>1 item added</p>";
}
else{
    echo "Basket unchanged";
}

$total = 0;  //Create a variable $total and initialize it to zero

//Create a HTML table with a header to display the content of the shopping basket
//i.e. the product name, the price, the selected quantity and the subtotal

echo "<table id='baskettable'>";
echo "<tr>";
echo "<th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Remove Product</th>";
echo "</tr>";

//if the session array $_SESSION['basket'] is set
if(isset($_SESSION['basket']))
{


    //loop through the basket session array for each data item inside the session using a foreach loop
    //to split the session array between the index and the content of the cell
    //for each iteration of the loop
    //store the id in a local variable $index & store the required quantity into a local variable $value
    foreach($_SESSION['basket'] as $index => $value){
        //SQL query to retrieve from Product table details of selected product for which id matches $index
        //execute query and create array of records $arrayp

        $SQL="SELECT prodId, prodName, prodPrice FROM products WHERE prodId='$index'";
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

        if($arrayp = mysqli_fetch_array($exeSQL))
        {
            echo "<tr>";
            //display product name & product price using array of records $arrayp
            echo "<td>" . $arrayp['prodName'] ."</td>";
            echo "<td>&pound" . number_format($arrayp['prodPrice'], 2) ."</td>";
            //display selected quantity of product received from the cell of session array and now in $value
            echo "<td style = 'text-align:center;'>" .$value. "</td>";
            //calculate subtota, store it in a local variable $subtotal and display it
            $subtotal = $arrayp['prodPrice'] * $value;
            echo "<td>&pound" .number_format($subtotal,2). "</td>" ;

            echo "<td>";
            echo "<form action=basket.php method=post>";
            echo "<input type=submit value='Remove' id='submitbtn'>";
            echo "<input type=hidden name=del_prodid value=".$arrayp['prodId'].">";
            echo "</form>";
            echo "</td>";
            
            echo "</tr>";
            //increase the total by adding the subtotal to the current total
            $total = $total+$subtotal;
        }
        else
        {
            echo "<tr><td colspan='4'>Error: Product not found</td></tr>";
        }
    }

        
}
else
{
    echo "<p>Empty basket</p>";
}

//display total
echo "<tr>";
echo "<td colspan=4>TOTAL</td>";
echo "<td>&pound" .number_format($total,2 ). "</td>";
echo "</tr>";
echo "</table>";

echo "<br><p><a href='clearbasket.php'>CLEAR BASKET</a><br>";
echo "<br><p>New homteq customers : <a href='signup.php'>Sign up</a><br>";
echo "<br><p>Returning hometeq Customers : <a href='login.php'>Login</a>";



include ("footfile.html");

echo "</body>";

?>
