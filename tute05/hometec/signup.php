<?php

$pagename = "Sign up"; // Create and populate a variable called $pagename
echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";

echo "<title>" . $pagename . "</title>";

echo "<body>";

include("headfile.html"); // Include header layout file

echo "<h4>" . $pagename . "</h4>"; // Display name of the page

// Registration Form
echo "<div class='formStyle'>";
echo "<form action='signup_process.php' method='post' id='signupform'>";

    // First Name
    echo "<div class='element'>";
        echo "<label>*First Name</label>";
        echo "<input type='text' name='r_firstname' size='35' required>";
    echo "</div>";

    // Last Name
    echo "<div class='element'>";
        echo "<label>*Last Name</label>";
        echo "<input type='text' name='r_lastname' size='35' required>";
    echo "</div>";

    // Address
    echo "<div class='element'>";
        echo "<label>*Address</label>";
        echo "<input type='text' name='r_address' size='35' required>";
    echo "</div>";

    // Postcode
    echo "<div class='element'>";
        echo "<label>*Postcode</label>";
        echo "<input type='text' name='r_postcode' size='35' required>";
    echo "</div>";

    // Telephone Number
    echo "<div class='element'>";
        echo "<label>*Tel No</label>";
        echo "<input type='text' name='r_telno' size='35' required>";
    echo "</div>";

    // Email Address
    echo "<div class='element'>";
        echo "<label>*Email Address</label>";
        echo "<input type='email' name='r_email' size='35' required>";
    echo "</div>";

    // Password
    echo "<div class='element'>";
        echo "<label>*Password</label>";
        echo "<input type='password' name='r_password1' maxlength='10' size='35' required>";
    echo "</div>";

    // Confirm Password
    echo "<div class='element'>";
        echo "<label>*Confirm Password</label>";
        echo "<input type='password' name='r_password2' maxlength='10' size='35' required>";
    echo "</div>";

    // Submit and Reset Buttons
    echo "<div class='element'>";
        echo "<input type='submit' value='Sign Up' name='submitbtn' id='submitbtn'>";
        echo "<input type='reset' value='Clear Form' name='resetbtn' id='submitbtn'>";
    echo "</div>";

echo "</form>";
echo "</div>";

include("footfile.html"); // Include footer file

echo "</body>";

?>
