<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Add Staff Member</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>

    <body>

        <h2 align="center"><em>Add Staff Member</em></h2>

        <div class="edit-div">
            <form method="Post" action="StaffName.php">
                <label for="sname"><em>Staff Name:</em></label><br>
                <input type="text" id="sname" name="sname"><br><br>
                <input type="submit" name="edit_staff" class="form-control" value="Add Staff">        

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

                $sname = "";
                $uname = "";
                $error_array = array();

                if(isset($_POST['edit_staff'])){
                    
                    //userName
                    if(isset( $_SESSION['username'])){
                        $uname =  $_SESSION['username'];
                    }
 
                    //Staff Name
                    $sname = strip_tags($_POST['sname']);
                    $fname = str_replace(' ', '', $sname);
                    $fname = ucfirst(strtolower($sname));
                    $_SESSION['sname'] = $sname;

                }   

                if($sname != ""){
                    $sql = "INSERT INTO companystaff (username,staff) VALUES ('$uname','$sname')";
                    if ($conn->query($sql) === TRUE) {
                        //echo "Record updated successfully";
                    } else {
                        echo "Error updating record " . $conn->error;
                    }
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

