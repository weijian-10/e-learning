<style>
    html{
        scroll-behavior: smooth;
    }

</style>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="css/carousel.css" rel="stylesheet">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
        
        <title>E-Learning</title>
    </head>
<?php
require("db.php");
session_start();
if(isset($_SESSION["user_id"])){
    $where=" where user_id='".$_SESSION["user_id"]."'";
}
else{
     $where="";
}
$query22="Select * from user ".$where."  ";
$result22=mysqli_query($con,$query22);
$row22=mysqli_fetch_array($result22);
if(isset($_SESSION["username"])){

    $username=$row22["username"]; 
    $login='';  
    $register="";
    $logout='<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$username.' <i class="fa fa-user" style="color:white" aria-hidden="true"></i>
                </button>
                 <div class="dropdown-menu " style="right:2px;"; aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="profile.php">Profile</a>
                     <a class="dropdown-item" onclick="logoutConfirm();return false" href="logout.php">Logout</a>

                 </div>
           </div>';
     $getstarted='<a class="btn btn-lg btn-primary" href="user_course.php" role="button" >Get Started</a>';
     $course='<a class="nav-link" href="user_course.php"><span class="course">Course</span></a>';
}
else{
        $login='<a style="margin-right:7px" class="btn btn-outline-success" href="admin_login.php"><span style="color:white">Admin Login</span></a>
            <a style="margin-right:7px" class="btn btn-outline-success" data-toggle="modal" data-target="#loginmodal"><span style="color:white">Login</span></a><br>
        ';
        $username="";
        $logout="";
        $register='<a class="btn btn-outline-success" data-toggle="modal" data-target="#registermodal"><span style="color:white">Register</span></a>';
        $getstarted='<a class="btn btn-lg btn-primary" data-toggle="modal" data-target="#loginmodal" >Get Started</a>';
        $course='<a class="nav-link" href="#" data-toggle="modal" data-target="#loginmodal" ><span class="course">Course</span></a> ';
    }
?>
<header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="index.php">E-Learning</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                       
                        <li class="nav-item">
                            <a class="nav-link " href="index.php"><span class="index">Home</span> <span class="sr-only">(current)</span></a>
                        </li>   
                        <li class="nav-item">
                            <?php echo $course;?>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php#about">
                            <span>About Us</span>
                        </a>
                           
                        </li>
                    
                    </ul>
                    <form class="form-inline mt-2 mt-md-0">
                      
                        <?php echo $login; ?>
                        <?php echo $register; ?>
                        <?php echo $logout;?>
                    </form>
                </div>  
            </nav>
        </header>
<script>

function logoutConfirm(){
    var conf = confirm('Are you sure want to logout?');
   if(conf)
      window.location.href="logout.php";
}
</script>