<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopping_mall";
    
    //create connection 
    $con = new mysqli($servername, $username, $password, $database);

    //check database
    if($con->connect_error){
      die("Connection failed : " . $con->connect_error);
    }
    else{
      echo "Connected successfully....";
    }
?>