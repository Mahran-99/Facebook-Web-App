<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Edit Info</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>

    <body>

        <h2 align="center"><em>Edit Your Info</em></h2>

        <div class="edit-div">
            <form method="Post" action="EditInfo.php">
                <label for="mobile"><em>Mobile:</em></label><br>
                <input type="text" id="mobile" name="mobile" placeholder="Max 20 Characters"><br><br>
                <label for="work"><em>Work:</em></label><br>
                <input type="text" id="work" name="work" placeholder="Max 40 Characters"><br><br>
                <label for="address"><em>Address:</em></label><br>
                <input type="text" id="address" name="address" placeholder="Max 40 Characters"><br><br>
                <label for="city"><em>City:</em></label><br>
                <input type="text" id="city" name="city" placeholder="Max 40 Characters"><br><br>
                <label for="skills"><em>Skills:</em></label><br>
                <input type="text" id="skills" name="skills" placeholder="Max 40 Characters"><br><br>
                <label for="bio"><em>Bio:</em></label><br>
                <input type="text" id="bio" name="bio" placeholder="Max 40 Characters"><br><br>
                <input type="submit" name="edit_user" class="form-control" value="Edit Info" >        

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
                $mobile = "";
                $work = "";
                $address = "";
                $city = "";
                $skills = "";
                $bio = "";
                $error_array = array();

                if(isset($_POST['edit_user'])){
                    
                    //userName
                    if(isset( $_SESSION['username'])){
                        $uname =  $_SESSION['username'];
                    }

                     
                    $mobile = strip_tags($_POST['mobile']);
                    $mobile = str_replace(' ', '', $mobile);
                    $mobile = ucfirst(strtolower($mobile));
                    $_SESSION['mobile'] = $mobile;

                    $work = strip_tags($_POST['work']);
                    $work = str_replace(' ', '', $work);
                    $work = ucfirst(strtolower($work));
                    $_SESSION['work'] = $work;

                    $address = strip_tags($_POST['address']);
                    $address = str_replace(' ', '', $address);
                    $address = ucfirst(strtolower($address));
                    $_SESSION['address'] = $address;

                    $city = strip_tags($_POST['city']);
                    $city = str_replace(' ', '', $city);
                    $city = ucfirst(strtolower($city));
                    $_SESSION['city'] = $city;

                    $skills = strip_tags($_POST['skills']);
                    $skills = str_replace(' ', '', $skills);
                    $skills = ucfirst(strtolower($skills));
                    $_SESSION['skills'] = $skills;

                    $bio = strip_tags($_POST['bio']);
                    $bio = str_replace(' ', '', $bio);
                    $bio = ucfirst(strtolower($bio));
                    $_SESSION['bio'] = $bio;
                } 
                $sql = "UPDATE users SET mobile='$mobile',work='$work',address='$address',city='$city',skills='$skills',bio='$bio' WHERE username='$uname'";
                
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

