<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$fname = "";
$lname = "";
$username = "";
$password = "";
$password2 = "";
$email = "";
$email2 = "";
$type="";
$date = "";
$dob = "";
$gender = "";
$profile_pic="";
$error_array = array();

if(isset($_POST['reg_user'])){
    
    //First Name 
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ', '', $fname);
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;
    
    //Last Name 
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '', $lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;
    
    //Username
    $username = strip_tags($_POST['username']);
    $username = str_replace(' ', '', $username);
    $username = ucfirst(strtolower($username));
    $_SESSION['username'] = $username;
    
    //Email
    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $email = ucfirst(strtolower($email));
    $_SESSION['reg_email'] = $email;
    
    //Email2
    $email2 = strip_tags($_POST['reg_email2']);
    $email2 = str_replace(' ', '', $email2);
    $email2 = ucfirst(strtolower($email2));
    $_SESSION['reg_email2'] = $email2;
    //type
    $type = strip_tags($_POST['reg_type']);
    $type = str_replace(' ', '', $type);
    $type = ucfirst(strtolower($type));
    $_SESSION['reg_type'] = $type;
    
    
    //Password
    $password = strip_tags($_POST['reg_password']);
    $password = str_replace(' ', '', $password);
    $password = ucfirst(strtolower($password));
    $_SESSION['reg_password'] = $password;

    //Password2
    $password2 = strip_tags($_POST['reg_password2']);
    $password2 = str_replace(' ', '', $password2);
    $password2 = ucfirst(strtolower($password2));
    $_SESSION['reg_password2'] = $password2;
    
    //Date of Birth 
    $dob = $_POST['dob'];
    
    //Gender
    $gender = $_POST['gender'];
    
    //Signup Date
    $date = date("Y-m-d");
    
    if($email == $email2){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'"); 
            
            $num_rows = mysqli_num_rows($e_check);
            
            if($num_rows > 0){
                array_push($error_array, "Email already in use");
            }
        }
        else{
            array_push($error_array, "Email is invalid format");
        }   
    }
    else{
        array_push($error_array, "Email doesn't match");
    }
    
    $user_check = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
    
    $num_rows = mysqli_num_rows($user_check);
    
    if($num_rows > 0){
        array_push($error_array, "Username already exists");
    }
    
    if(strlen($username) > 20 || strlen($username) < 2){
        array_push($error_array, "Username must be between 2 and 20");
    }
            
    else if(preg_match('/[^A-Za-z0-9]/', $username)){
        array_push($error_array, "You username can only contain english characters or numbers");
    }

    if(strlen($fname) > 25 || strlen($fname) < 2){
        array_push($error_array, "Your first name must be between 2 and 25 characters");
    }
    
    if(strlen($lname) > 25 || strlen($lname) < 2){
        array_push($error_array, "Your last name must be between 2 and 25 characters");
    }
    
    if($password != $password2){
        array_push($error_array, "Your passwords doesn't match");
    }
    
    else{ 
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            array_push($error_array, "Your password can only contain english characters or numbers");
        }
    }
    
    if(strlen($password > 30 || strlen($password) < 5)){
        array_push($error_array, "Your password must be between 5 and 30 characters or numbers");
    }
    
   if(empty($error_array)){
    
        $password = $password;

        if($gender == "Male"){
            $profile_pic = "male.png";
            
        }

        else if($gender == "Female"){
            $profile_pic = "female.png";
            
        }
        
    
    $query="INSERT INTO users (first_name,last_name,username,email,dob,gender,password,signup_date,profile_pic,mobile,work,type)VALUES
    ('$fname','$lname','$username','$email','$dob','$gender','$password','$date','$profile_pic','0','$work','$type')";
    
  // $query="INSERT INTO users (first_name)VALUES
    //('ahmed')";
    
        
        mysqli_query($con, $query);
        $_SESSION['username'] = $username;
       
        if($type == "Profile"){
            $update_msg=mysqli_query($con,"UPDATE users SET log_in='Online' WHERE email='$email'");
            header('Location: register.php');
        }
        elseif($type == "Company"){
            $update_msg=mysqli_query($con,"UPDATE users SET log_in='Online' WHERE email='$email'");
            header('Location: register.php');
        }
        else{
            header('Location: NoType.php');
            
        }
        

       // echo $fname;
        //echo $lname;
        //echo $password;
    
       // }
        //$query = "INSERT INTO users (first_name, last_name,  password) VALUES (?,?,?)";
    
    }  
}

?>