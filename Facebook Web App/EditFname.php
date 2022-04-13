<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Edit First Name</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>

    <body>

        <h2 align="center"><em>Edit Your First Name</em></h2>

        <div class="edit-div">
            <form method="Post" action="EditFname.php">
                <label for="fname"><em>FirstName:</em></label><br>
                <input type="text" id="fname" name="fname"><br><br>
                <input type="submit" name="edit_user" class="form-control" value="Edit Info">        

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


                $fname = "";
                $uname = "";
                $error_array = array();

                if(isset($_POST['edit_user'])){
                    
                    //userName
                    if(isset( $_SESSION['username'])){
                        $uname =  $_SESSION['username'];
                    }

                    //First Name 
                    $fname = strip_tags($_POST['fname']);
                    $fname = str_replace(' ', '', $fname);
                    $fname = ucfirst(strtolower($fname));
                    $_SESSION['fname'] = $fname;

                }   

                $sql = "UPDATE users SET first_name='$fname' WHERE username='$uname'";

                if ($conn->query($sql) === TRUE) {
                    //echo "Record updated successfully";
                } else {
                    echo "Error updating record " . $conn->error;
                }

                $conn->close();
            ?>

            <br/>
            <br/> 
            <div class="edit-div">  
                <form method="POST" action="Edit.php">
                    <input type="submit" value="Return">
                </form>        
            </div>


    </body>
</html>

