<!DOCTYPE html>
<?php
session_start();
include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';
include 'includes/form_handlers/connection.php';
if(!isset ($_SESSION['log_email'])){
    header("location:register.php");
}
else{?>
<html>
<head>  
<title>My Chat -  HOME</title> 
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="messages.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    
</head>
<body>
    <div class= "container main -section">
        <div class = "row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
             <div class="input-group searchbox">
                <div class="input-group-btn">
                 
        
                    </div>
                </div>    
            <div class="left-chat">
            <ul>
            <?php include("includes/form_handlers/get_user_data.php");  ?>    
             </ul>
          </div>
         </div>
        <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
         <div class="row">
            <!--User Info. -->
             <?php   $user = $_SESSION['log_email'];
                $get_user = "select *from users where email='$user'";
                $run_user = mysqli_query($con,$get_user);
                $row = mysqli_fetch_array($run_user);

                $user_id = $row['id'];
                $user_name = $row['username'];
               
        ?>
        
        <?php 
        if (isset($_GET['user_name'])){
            global $con;
            $get_username=$_GET['user_name'];
            $get_user="select * from users where username ='$get_username'";
            
            $run_user=mysqli_query($con,$get_user);
            
            $row_user=mysqli_fetch_array($run_user);
            $username=$row_user['username'];
            $user_profile_image=$row_user['profile_pic'];
            
        }
          $total_messages="select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR(receiver_username='$user_name' AND sender_username='$username')";
          $run_messages=mysqli_query($con,$total_messages);
          $total=mysqli_num_rows($run_messages);
        ?>

        <div class="col-md-12 right-header">
         <div class="right-header-img">
        <img src="<?php  echo $user_profile_image; ?>">   
        </div>

        <div class="right-header-detail">
        <form method="post">
            <p><?php echo "$username"; ?> </p>    
            <span><?php    echo $total; ?> messages</span>&nbsp &nbsp 
            <button name="return" class="btn btn-danger">Return</button>    
        </form>

        <?php if(isset($_POST['return'])){
            $type = $_SESSION['reg_type'];
            if($type == "Profile"){
              header('Location: userProfile.php');
            }
            elseif($type == "Company"){
              header('Location: companyProfile.php');
            }
            else{
                exit();
            }
                       
            } 
        ?>

        
    </div>
    </div>
    </div>

        <div class="row">
            <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
             <?php
                $update_msg= mysqli_query($con,"UPDATE users_chat SET msg_status='read'
                     WHERE sender_username='$username' AND receiver_username='$user_name'");

                $sel_msg="select * from users_chat where (sender_username='$user_name' AND receiver_username= '$username') OR (receiver_username='$user_name' AND sender_username ='$username') ORDER by 1 ASC";
                $run_msg=mysqli_query($con,$sel_msg);

                while($row=mysqli_fetch_array($run_msg)){
                
                $sender_username=$row['sender_username'];
                $receiver_username=$row ['receiver_username'];
                $msg_content=$row['msg_content'];
                $msg_date=$row['msg_date'];
                
            
            
                 ?>
            <ul>
                <?php 
                    if($user_name == $sender_username AND $username == $receiver_username){
                         echo"
                         <li>
                         <div class= rightside-right-chat>
                            <span> $user_name  <small> $msg_date</small></span><br><br>
                                <p> $msg_content</p>
                        </div> 
                        </li>
                        ";     
                      }  
                
      
                    else if($user_name==$receiver_username AND $username==$sender_username){
                     echo " 
                     <li>
                      <div class= rightside-left-chat> 
                         <span> $username  <small> $msg_date</small></span><br><br>
                             <p> $msg_content</p>
                    </div> 
                </li>
                ";
                
            }   
                        
            ?>

            </ul>
            <?php
             } 
            ?>
            </div>
            </div>

             <div class="row">
        
                <div class="col-md-12 right-chat-textbox">
                    <form method="post">
                        <input  autocomplete=" off" type="text" name="msg_content" placeholder="Wite your message......">
                            <button class="btn" name="submit"> <i class="fa fa-telegram" aria-hidden="true"></i></button>
            
                    </form>    
                </div>
             </div>
        </div>    
    </div>
</div>
    
            <?php 
            
            if (isset($_POST['submit'])){
                
                $msg = htmlentities($_POST['msg_content']);
                
                if ($msg== " "){
            
                    echo "
                    <div class = 'alert alert-danger'>
                    <strong> <center>MESSAGE unable to send </center></strong>
                    </div>
                    ";
            
                }
                else if (strlen($msg)>100){
                
                echo "
                <div class = 'alert alert-danger'>
                <strong> <center>MESSAGE too long </center></strong>
                </div>
                ";

                }
                else {
                    
                    $insert="insert into users_chat(sender_username,receiver_username,msg_content,msg_status,msg_date) values('$user_name','$username','$msg','unread',NOW())";
                    $run_insert=mysqli_query($con, $insert);
                }
            } 
        ?>
        <script>
        $('#scrolling_to_bottom').animate({
        scrollTop :$('##scrolling_to_bottom').get(0).scrollHeight},1000)
        </script>
        <script type ="text/javascript">
         $(document).ready(function(){
        var height =$(window).height();
        $('.left-chat').css('height',(height-92)+'px');
        $('.right-header-contentChat').css('height',(height-163)+'px');
        
         });
        </script>
</body>
</html>
<?php } ?>