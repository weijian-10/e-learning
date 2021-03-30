<?php
require("../db.php");  
   session_start();
            $username=$_GET['username'];
            $password=$_GET['password'];
            $query="select * from user where username='$username' and password='$password' ";                
            $result=mysqli_query($con,$query);
            $rows = mysqli_num_rows($result);
            $user=mysqli_fetch_array($result);  
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['course_id'] = $user['course_id'];

        if ($rows == 1){
               $_SESSION['username']=$username;
               echo "success";
            }
    else{
        echo "failed";
        }

?>