<?php

if(isset($_POST['login_button'])){

        $email = filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL);

        $_SESSION['log_email']=$email;
        $password=$_POST['log_password'];


        $check_database_query = mysqli_query($con,"SELECT * FROM users
          WHERE email='$email' AND password ='$password'");
        $check_login_query=mysqli_num_rows($check_database_query);

        if($check_login_query==1){

            $row=mysqli_fetch_array($check_database_query);
            $username=$row['username'];
            $type=$row['type'];
           $_SESSION['username'] =$username;
           $_SESSION['reg_type'] = $type;
             
            if($type == "Profile"){
              $update_msg=mysqli_query($con,"UPDATE users SET log_in='Online' WHERE email='$email'");
              header('Location: userProfile.php');
            }
            elseif($type == "Company"){
              $update_msg=mysqli_query($con,"UPDATE users SET log_in='Online' WHERE email='$email'");
              header('Location: companyProfile.php');
            }
            else{
              header('Location: NoType.php');
              
            }

            exit();

    }
    else{

        array_push($error_array,"email or password was incorrect");

    }
}

?>


