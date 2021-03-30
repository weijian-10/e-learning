<?php
session_start();
   if(!isset($_SESSION["username"])) {
     header("location:index.php");
   }    
?>
<?php
include("navbar.php");
include("db.php");

$query="Select * from course";
$result=mysqli_query($con,$query);
?>    
<style>
    .course{
        color:white;
    }

</style>
<div class="row" style="margin-top:50px;margin-left:100px;margin-right:50px">
    <?php
    while($row=mysqli_fetch_array($result)){
    ?>
    <div class="col-md-4">
        
        <div class="card" style="width: 18rem;margin-bottom:50px">
            <img class="card-img-top"  width="30" height="130" src="<?php echo $row["course_image"]; ?>" >
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["course_name"]; ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a  href="user_subject.php?course_id=<?php echo $row["course_id"]; ?>"  class="btn btn-primary" >Click Here</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<script>



</script>