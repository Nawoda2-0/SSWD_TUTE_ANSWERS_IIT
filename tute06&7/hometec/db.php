<?php 

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'w2051783';

    //create a DB connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //if the DB connection fails, display an error message and exit
    if(!$conn)
    {
        die('Could not connect: ' . mysqli_connect_error());
    }
    else
    {
        //select the database
        mysqli_select_db($conn, $dbname);
        echo "connection established";
    }

    

?>