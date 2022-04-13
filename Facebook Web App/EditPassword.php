<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Edit Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>


    <body>

        <h2 align="center"><em>Edit Your Password</em></h2>

        <div class="edit-div">
            <form method="Post" action="EditPassword.php">
                <label for="fname"><em>New-Password:</em></label><br>
                <input type="text" id="New-Password" name="New-Password"><br>
                <label for="fname"><em>Confirm-Password:</em></label><br>
                <input type="text" id="Confirm-Password" name="Confirm-Password"><br><br>
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


                $uname = "";
                $password = "";
                $password2 = "";
                $error_array = array();

                if(isset($_POST['edit_user'])){
                    
                    //User Name 
                    if(isset( $_SESSION['username'])){
                        $uname =  $_SESSION['username'];
                    }
                    

                    //Password 
                    $password = strip_tags($_POST['New-Password']);
                    $password = str_replace(' ', '', $password);
                    $password = ucfirst(strtolower($password));
                    $_SESSION['New-Password'] = $password;

                    //Password2
                    $password2 = strip_tags($_POST['Confirm-Password']);
                    $password2 = str_replace(' ', '', $password2);
                    $password2 = ucfirst(strtolower($password2));
                    $_SESSION['Confirm-Password'] = $password2;
                } 
                
                if($password != $password2){
                    echo "You passwords doesn't match";
                    array_push($error_array, "Your passwords doesn't match");
        
                }else{
                    $sql = "UPDATE users SET password='$password' WHERE username='$uname'";
                    if ($conn->query($sql) === TRUE) {
                        //echo "Record updated successfully";
                        } else {
                            echo "<br>" ;
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


