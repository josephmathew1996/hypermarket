<?php 

    // In the variables section below, replace user and password with your own MySQL credentials as created on your server
    $servername = "localhost";
    $username = "joseph";
    $password = "password";
    $database =  "market";

    // Create MySQL connection
    $conn =mysqli_connect($servername, $username, $password,$database);

    // Check connection - if it fails, output will include the error message
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
   //echo '<p>Connected successfully</p>';

    
    
?>