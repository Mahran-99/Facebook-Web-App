<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Edit Picture</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>


    <body>

        <h2 align="center"><em>Edit Your Profile Picture</em></h2>

        <div>

            <form method="Post" action="EditPic.php">
                <label for="myfile">Select a file:</label>
                <input type="file" id="myfile" name="myfile"><br><br>
                <input type="submit" name="edit-pic"  value="Edit Picture">
            </form>

        </div>
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
                $profile_pic="";
                $error_array = array();
                echo $profile_pic;
                if(isset($_POST['edit-pic'])){
                    
                    if(isset( $_SESSION['username'])){
                        $uname =  $_SESSION['username'];
                    }
                    
                  
                    $profile_pic = strip_tags($_POST['myfile']);
                    $profile_pic = str_replace(' ', '', $profile_pic);
                    $profile_pic = ucfirst(strtolower($profile_pic));
                    $_SESSION['myfile'] = $profile_pic;

                }   

                $sql = "UPDATE users SET profile_pic='$profile_pic' WHERE username='$uname'";

                if ($conn->query($sql) === TRUE) {
                //echo "Record updated successfully";
                } else {
                echo "Error updating record " . $conn->error;
                }

                $conn->close();
            ?>

            <br/>
            <br/>   
            <form method="POST" action="Edit.php">
                <input type="submit" value="Return">
            </form>  


    </body>
</html>


