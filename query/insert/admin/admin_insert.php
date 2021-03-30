   <?php 
require("../../../db.php");  
            $username=$_GET['admin_username'];
            $password=$_GET['admin_pass'];
            $query="Insert Into admin(admin_username,admin_pass)values('$username','$password')";
            $result=mysqli_query($con,$query);

 ?>

      