<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';

?>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img class="nav-logo" src="imgs/undraw_online_connection_6778.svg"/>
      </a>
      <form class="d-flex">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
      </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="companyProfile.php">
            <div class="nav-img-div">
            <?php
              $uname = $_SESSION['username'];
              $check_database_query = mysqli_query($con,"SELECT * FROM users
              WHERE username='$uname'");
              while ($row = $check_database_query->fetch_assoc()) {
                $path = $row['profile_pic'];
                $mobile = $row['mobile'];
                $work = $row['work'];
                $address = $row['address'];
                $city = $row['city'];
                $skills = $row['skills'];
                $bio = $row['bio'];
                $destination = $row['type'];
                if($destination == "Profile"){
                    $destination2="userProfile.php";
                }
                else{
                    $destination2="companyProfile.php";
                }
              }
            ?>
              <img class="nav-img" src="<?php echo $path?>"/>
                <span class="nav-profile-name"><?php if(isset( $_SESSION['username'])){
                echo  $_SESSION['username'];         }?></span>
            </div>
            </a>
        </li>
       <li class="nav-item">
          <a class="nav-link active" href="<?php echo $destination2?>">
            <div class="nav-home-icon tooltipp">
              <img class="home-icon" src="imgs/iconmonstr-user-20.svg"/>
                  <span class="tooltiptext">Profile Page</span>
            </div>
            </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="messages.php">
            <div class="nav-home-icon tooltipp">
              <img class="home-icon" src="imgs/iconmonstr-facebook-messenger-1.svg"/>
                <span class="tooltiptext">Messages</span>
            </div>
          </a>
        </li>
          
          
        <li class="nav-item">
          <a class="nav-link active" href="Edit.php">
            <div class="nav-home-icon tooltipp">
              <img class="home-icon" src="imgs/iconmonstr-gear-1.svg"/>
                <span class="tooltiptext">Edit</span>
            </div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="logout.php">
            <div class="nav-home-icon tooltipp">
              <img class="home-icon" src="imgs/iconmonstr-log-out-4.svg"/>
                <span class="tooltiptext">LogOut</span>  
            </div>
          </a>
        </li>
          
      </ul>

    </div>
  </div>
</nav> 
<section class="post-fix">

    <?php 

        $sql = mysqli_query($con,"SELECT * FROM posts ORDER BY id DESC");
        

        while ($row = $sql->fetch_assoc()) {
            $id = $row['id'];
            $username = $row['username'];
            $word = $row['word'];
            $image = $row['image'];
            $date = $row['post_date'];

            $new_sql=mysqli_query($con,"SELECT profile_pic FROM users where username='$username'");
            while($new_row = $new_sql->fetch_assoc()){
                $profile = $new_row['profile_pic'];
            }
            

            echo " 
            <div class='home-post'>
            <div class='home-post-name'>
               <img src='$profile'>
               <span>$username</span>
               </div>
               
               <div class='home-post-info'>
                    <p>$word</p> 
               <img src='$image'>
                 
               </div>
               <span class='likes-content'></span>
               <div class='interaction-bar'>
               <p class='like-post'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M21.216 8h-2.216v-1.75l1-3.095v-3.155h-5.246c-2.158 6.369-4.252 9.992-6.754 10v-1h-8v13h8v-1h2l2.507 2h8.461l3.032-2.926v-10.261l-2.784-1.813zm.784 11.225l-1.839 1.775h-6.954l-2.507-2h-2.7v-7c3.781 0 6.727-5.674 8.189-10h1.811v.791l-1 3.095v4.114h3.623l1.377.897v8.328z'/></svg> Like</p>
               <p class='comment'><img src='imgs/iconmonstr-speech-bubble-comments-thin.svg'> Comment</p>
               <p>$date</p>
               </div>
               
               
               
           </div>
                   </section>
            <div class='post-popup-background'>
                
            <div class='post-popup'>
                
                <div class='close-popup'>
                <span>Comments</span>
                <div class='close-btn'>
                    <img src='imgs/iconmonstr-x-mark-1.svg'/>
                    </div>
            </div>  
                    <input class='form-control posts-form-open mt-2 mb-4 add-comment' type='text'  placeholder='Comment'>
                
                <div class='comments'>
                
                
                </div>
       
       
       
      
      
       
      
   
   
            <button class='btn btn-dark post-btn comment-adding'>Comment</button>
       
            </div>    
       
       
       
       
            </div>
            ";

        
        }
        

        $sql2 = mysqli_query($con,"SELECT * FROM posts_profile ORDER BY id DESC");

        while ($row2 = $sql2->fetch_assoc()) {
            $id2 = $row2['id'];
            $username2 = $row2['username'];
            $word2 = $row2['word'];
            $image2 = $row2['image'];
            $date2 = $row2['post_date'];

            $new_sql2=mysqli_query($con,"SELECT profile_pic FROM users where username='$username2'");
            while($new_row2 = $new_sql2->fetch_assoc()){
                $profile2 = $new_row2['profile_pic'];
            }

            echo "  <div class='home-post'>
            <div class='home-post-name'>
               <img src='$profile2'>
               <span>$username2</span>
               </div>
               
               <div class='home-post-info'>
                    <p>$word2</p> 
               <img src='$image2'>
                 
               </div>
               
               <div class='interaction-bar'>
               <p><img src='imgs/iconmonstr-facebook-like-1.svg'> Like</p>
               <p class='comment'><img src='imgs/iconmonstr-speech-bubble-comments-thin.svg'> Comment</p>
               <p>$date2</p>
               </div>
               
               
               
           </div>
                   </section>
            <div class='post-popup-background'>
                
            <div class='post-popup'>
                
                <div class='close-popup'>
                <span>Comments</span>
                <div class='close-btn'>
                    <img src='imgs/iconmonstr-x-mark-1.svg'/>
                    </div>
            </div>  
                    <input class='form-control posts-form-open mt-2 mb-4 add-comment' type='text'  placeholder='Comment'>
                
                <div class='comments'>
                
                
                </div>
       
       
       
      
      
       
      
   
   
            <button class='btn btn-dark post-btn comment-adding'>Comment</button>
       
            </div>    
       
       
       
       
            </div> ";

        
        }

        $con->close();


    ?>

      
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/108/three.min.js"></script>   
<script src="hoverEffect.js"></script>
<script src="comment.js"></script>
</body>
</html>






