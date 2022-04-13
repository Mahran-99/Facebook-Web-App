<?php

ob_start();
session_start();

$con = mysqli_connect("localhost", "root", "12345678", "mywebsite");

if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
}
else {
    //echo"we are connected to database";
}
?>