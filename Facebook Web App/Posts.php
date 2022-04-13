<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>


<!DOCTYPE html>
<html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>


    <body>


            <?php
                $servername = "localhost";
                $username = "root";
                $password = "12345678";
                $dbname = "mywebsite";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $uname = "";
                $word = "";
                $image = "";
                $error_array = array();
                if(isset($_POST['post'])){
                    
                    if(isset( $_SESSION['username'])){
                        $uname =  $_SESSION['username'];
                    }
                    
                
                    $word = strip_tags($_POST['word']);
                    $word = str_replace(' ', '', $word);
                    $word = ucfirst(strtolower($word));
                    $_SESSION['word'] = $word;

                    $image = strip_tags($_POST['image']);
                    $image = str_replace(' ', '', $image);
                    $image = ucfirst(strtolower($image));
                    $_SESSION['image'] = $image;

                }     

                $sql =  "INSERT INTO posts (username,word,image,post_date) VALUES ('$uname','$word','$image',NOW())";

                if ($conn->query($sql) === TRUE) {
                    header('Location: companyProfile.php');
                //echo "Record updated successfully";
                } else {
                echo "Error updating record " . $conn->error;
                }

                $conn->close();
            ?>



    </body>
</html>


