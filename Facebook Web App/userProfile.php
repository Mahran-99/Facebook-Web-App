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
          <a class="nav-link active" aria-current="page" href="userProfile.php">
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
                echo  $_SESSION['username'];         }  ?></span>

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
    
<section id="profile-i">
<div class="profile-first">
    
</div>    

<div class="profile-second">
    
</div>   
    
<div class="profile-content">
    <div class="profile-img">
   
    </div>
    
    <div class="profile-about">
    <h2>Name:<?php if(isset( $_SESSION['username'])){
    echo  $_SESSION['username'];         }  ?></h2>
        <h4 class="mt-3">Bio:</h4>
    <p class="mt-3 pl-2 pr-2"><?php echo $bio?></p>
        
        <p class="mt-3">
        <img src="imgs/iconmonstr-phone-1.svg"/> <?php echo $mobile?>
        </p>
         <p class="mt-1">
        <img class="pb-1" src="imgs/iconmonstr-home-7.svg"/><?php echo $address?>
        </p>
        
        <ul class="media-icons">
            <li><img src="imgs/iconmonstr-instagram-11.svg"/> </li>
            <li><img src="imgs/iconmonstr-facebook-3.svg"/> </li>
            <li><img src="imgs/iconmonstr-twitter-1.svg"/> </li>
        
        </ul>
    </div>
</div>  
    
</section>    
    
  
<section id="profile-ii">
    
<div class="intro">
    
<h4>Intro</h4>  
<p>
<img class="pb-1" src="imgs/iconmonstr-briefcase-5.svg"/>
Works at: <span> <?php echo $work?></span>    
</p>

<p>
<img class="pb-1" src="imgs/iconmonstr-idea-7.svg"/>
Skill:<span> <?php echo $skills?></span>    
</p>

<p>
<img class="pb-1" src="imgs/iconmonstr-home-7.svg"/>
Location:<span> <?php echo $city?></span>    
</p>
       
</div>   
    
    
<div class="profile-posts">
        
    
<div class="post-the-post">
    
   <form class="d-flex">
       <img src="<?php echo $path?>"/>
        <input class="form-control posts-form-open" type="text"  placeholder="What's on your mind?">
      </form> 

    
    
</div>  
 


    
</div>



</section> 


     
    
    
    
<div class="post-popup-background">
    
<div class="post-popup">
    
 <div class="close-popup">
    <span>Create post</span>
    <div class="close-btn">
     <img src="imgs/iconmonstr-x-mark-1.svg"/>
     </div>
</div>   
   
    
    
<div class="popup-profile-img">
   <img src="<?php echo $path?>"/>
    <span><?php if(isset( $_SESSION['username'])){
    echo  $_SESSION['username'];         }  ?></span>
    
</div> 

      <form method="POST" action="Posts_profile.php">
        <div class="form-group pt-3">
        <input class="form-control write-post-form" type="text" id="word" name="word" placeholder="What's on your mind?"> 
        <input class="pt-3 post-img-attach" id="file-input" type="file" name="image"  /> 
        <input class="form-control" type="submit" name="post" value="Post">
        </div> 
      </form>

    
</div>    
    
    
    
    
</div>    

<?php
 $sql2 = mysqli_query($con,"SELECT * FROM posts_profile ORDER BY id DESC");

 while ($row2 = $sql2->fetch_assoc()) {
     $id2 = $row2['id'];
     $username2 = $row2['username'];
     $word2 = $row2['word'];
     $image2 = $row2['image'];
     $date2 = $row2['post_date'];

    
    

    echo "  <div class='home-post'>
            <div class='home-post-name'>
               <img src='$path'>
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
<script type="text/javascript">var color = "<?=$path?>";</script>
<script type="text/javascript" src="dataProfile.js"></script>
</body>    
</html>


