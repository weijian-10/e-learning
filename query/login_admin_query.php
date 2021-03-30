<?php
require("../db.php");  
session_start();
            $username=$_GET['admin_username'];
            $password=$_GET['admin_pass'];
            $query="select * from admin where admin_username='$username' and admin_pass='$password' ";                
            $result=mysqli_query($con,$query);
            $rows = mysqli_num_rows($result);
            $rowsa = mysqli_fetch_array($result);
       
            $query2="select * from teacher where teacher_username='$username' and teacher_password='$password' ";                
            $result2=mysqli_query($con,$query2);
            $rows2 = mysqli_num_rows($result2);
            $rows2a = mysqli_fetch_array($result2);



            if($rows == 1) { //admin login
                $_SESSION["username"]=$username;
                $_SESSION['admin_id'] = $rowsa['admin_id'];
                if($_SESSION["admin_id"]){
                    echo 1;
                } 
            }

            elseif($rows2 == 1) { //teacher login
                $_SESSION["username"]=$username;
                $_SESSION['teacher_id'] = $rows2a['teacher_id'];
                $_SESSION['course_id'] = $rows2a['course_id'];
                if($_SESSION["teacher_id"]){
                    echo 2;
                } 
            }




?>

