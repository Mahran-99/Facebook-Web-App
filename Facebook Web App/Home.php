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
              }
            ?>
              <img class="nav-img" src="<?php echo $path?>"/>
                <span class="nav-profile-name"><?php if(isset( $_SESSION['username'])){
                echo  $_SESSION['username'];         }?></span>
            </div>
            </a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link active" href="HomePage.php">
            <div class="nav-home-icon tooltipp">
              <img class="home-icon" src="imgs/iconmonstr-home-7.svg"/>
                  <span class="tooltiptext">Home</span>
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
        <div class="home-post">
         <div class="home-post-name">
            <img src="imgs/pexels-emily-garland-1499327.jpg">
            <span>Omar Mohamed</span>
            </div>
            
            <div class="home-post-info">
                 <p>omar loves manggoo</p> 
            <img src="imgs/heightMap.png">
              
            </div>
            
            <div class="interaction-bar">
            <p><img src="imgs/iconmonstr-facebook-like-1.svg"> Like</p>
            <p class="comment"><img src="imgs/iconmonstr-speech-bubble-comments-thin.svg"> Comment</p>
            </div>
            
            
            
        </div>
                </section>
<div class="post-popup-background">
    
<div class="post-popup">
    
 <div class="close-popup">
    <span>Comments</span>
    <div class="close-btn">
     <img src="imgs/iconmonstr-x-mark-1.svg"/>
     </div>
</div>   
      <input class="form-control posts-form-open mt-2 mb-4 add-comment" type="text"  placeholder="Comment">
    
    <div class="comments">
    
   
    </div>
    
    
    
   
   
    
   


    <button class="btn btn-dark post-btn comment-adding">Comment</button>
    
</div>    
    
    
    
    
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/108/three.min.js"></script>   
<script src="hoverEffect.js"></script>
<script src="comment.js"></script>
</body>
</html>