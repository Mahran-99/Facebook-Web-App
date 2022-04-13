<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>

<html>
    <head>
        <title>Edit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/> 
    </head>
    <body>
        <h1 align="center" ><em>Edit Your Data</em></h1>

        <div class="edit-div">
            <?php
                 if($_SESSION['reg_type'] == "Profile"){
                    echo "<p><em>Make your Choice:</em></p>";

                    echo ' <form method="POST" action="EditFname.php">
                                <input class="form-control" type="submit" value="Edit First Name">
                            </form> ';
        
                    echo ' <form method="POST" action="EditPassword.php">
                                <input class="form-control" type="submit" value="Edit Password">
                            </form> ';
        
                    echo '  <form method="POST" action="EditPic.php">
                                <input class="form-control" type="submit" value="Edit Profile Picture">
                            </form> ';

                    echo '  <form method="POST" action="EditInfo.php">
                                <input class="form-control" type="submit" value="Edit Profile Info">
                            </form> ';
        
                    echo '  <form method="POST" action="userProfile.php">
                                <input class="form-control" type="submit" value="Go to Profile Page">
                            </form> ';
        
                }
                else if($_SESSION['reg_type'] == "Company"){
                    echo "<p><em>Make your Choice:</em></p>";

                    echo ' <form method="POST" action="EditFname.php">
                                <input class="form-control" type="submit" value="Edit First Name">
                            </form> ';
         
                    echo ' <form method="POST" action="EditPassword.php">
                                <input class="form-control" type="submit" value="Edit Password">
                            </form> ';
         
                    echo ' <form method="POST" action="EditPic.php">
                                <input class="form-control" type="submit" value="Edit Profile Picture">
                            </form> ';

                    echo ' <form method="POST" action="StaffName.php">
                                <input class="form-control" type="submit" value="Add Staff Member">
                            </form> ';
                            
                    echo '  <form method="POST" action="EditInfo.php">
                                <input class="form-control" type="submit" value="Edit Company Info">
                            </form> ';
         
                    echo '   <form method="POST" action="companyProfile.php">
                         <input class="form-control" type="submit" value="Go Company Page">
                     </form> ';
                }

            ?>

        </div>

 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>