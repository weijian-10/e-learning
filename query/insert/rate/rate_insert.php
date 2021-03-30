   <?php 
require("../../../db.php");  
session_start();
if(isset($_SESSION["admin_id"])){
    $login_id=$_SESSION["admin_id"];
}
elseif($_SESSION["user_id"]){
        $login_id=$_SESSION["user_id"];

}
elseif($_SESSION["teacher_id"]){
        $login_id=$_SESSION["teacher_id"];

}
$query2="Select * from rating where user_id='$login_id' and rate_topic_id='".$_GET['rate_topic_id']."'";
$result2=mysqli_query($con,$query2);
$num_rows=mysqli_num_rows($result2);
if($num_rows==0){
$rate_topic_id=$_GET['rate_topic_id'];
$date=date("Y-m-d H:i:s");
$query="INSERT INTO `rating` (`rate_topic_id`,user_id) VALUES ('$rate_topic_id','$login_id')";
$result=mysqli_query($con,$query);

}
else{
echo 1;
}
 
 ?>

      