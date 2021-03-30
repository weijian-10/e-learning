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

            $topic_comment= mysqli_real_escape_string($con, $_GET['topic_comment']);
            $topic_question_id=$_GET['topic_question_id'];
            $date=date("Y-m-d H:i:s");
            $query="Insert Into topic(topic_comment,topic_user_id,topic_datetime,topic_question_id)values('$topic_comment','$login_id','$date','$topic_question_id')";
            $result=mysqli_query($con,$query);



 ?>

      