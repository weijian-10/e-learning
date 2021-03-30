<?php
require("db.php");
require("headerlink.php");
$question_id=$_GET["question_id"];
 $query="SELECT * FROM  question WHERE question.question_id='".$question_id."' ";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
?>
<style>
    .pb-cmnt-container {
        font-family: Lato;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
    .card-inner{
    margin-left: 4rem;
}   
</style>
<br>

<input type="hidden" name="question_id" id="question_id" value="<?php echo $_GET["question_id"]?>" >
<body style="margin-left:20px;margin-top:20px">
<div class=" pb-cmnt-container" style="margin-left:470px">
    <button type="button" onclick="window.close()" class="btn btn-primary">Close</button>
    <h4><?php echo $row["question_title"]; ?></h4>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-body">
                    <textarea placeholder="Write your comment here!" required id="commentbox" class="pb-cmnt-textarea"></textarea><br>
                    <form class="form-inline">
                        <button class="btn btn-primary pull-right" type="button" onclick="addComment()">Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <?php 
    $query1="SELECT * FROM `topic` INNER JOIN question ON topic_question_id=question.question_id INNER JOIN user on topic.topic_user_id=user.user_id WHERE                   topic_question_id='$question_id' ORDER BY topic_id desc";
$result1=mysqli_query($con,$query1);
$num_rows=mysqli_num_rows($result1);
if($num_rows>0){

while($row1=mysqli_fetch_array($result1)){
$query2="SELECT *, COUNT(rate_id) as crate FROM rating WHERE rate_topic_id='".$row1["topic_id"]."'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);
?>
    <div class="container">

	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="<?php echo $row1["image"] ?>" style="height:150px;width:150px" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center"><?php echo $row1["topic_datetime"]; ?></p>   
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?php echo $row1["username"]; ?></strong></a>
        	      

        	       </p>
        	       <div class="clearfix"></div>
        	        <p><?php echo $row1["topic_comment"]; ?></p>
        	        <p>
        	            <button type="button" onclick="rate(this.value)" value="<?php echo $row1["topic_id"] ?>" id="button" class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like <?php echo $row2["crate"]; ?></button>
                   
                      
        	       </p>
        	    </div>
	        </div>
	   
	    </div>
	</div>
</div>
<?php 
            }
    
    }
    else{
        echo
            '<div class="container">
            <div class="card">
	    <div class="card-body">
	        <div class="row">
        	   
        	      <b>Doesnt have any comment yet.</b>
        	       
        	    </div>
	        </div>
	   
	    </div>
	    </div>
	</div>';
    }
    ?>
    
</body>

<script>
function addComment(){
   if(document.getElementById("commentbox").value=="")
        {
               alert("Please Type comment");
               return false;
        }
    
      var xmlhttp;
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5    
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
                 window.location.reload();
                alert("Add Comment success");
                document.getElementById("commentbox").value="";
         
      
    }
};

xmlhttp.open("GET","query/insert/comment/comment_insert.php?topic_comment="+document.getElementById("commentbox").value+
             "&topic_question_id="+document.getElementById("question_id").value,true);
xmlhttp.send();
}
function rate(str){
          var xmlhttp;
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5    
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
        if(xmlhttp.responseText == 1){
            alert("you already liked this comment");
        }
        else{
            alert("thanks for your like");
        }
                 window.location.reload();
    }
};

xmlhttp.open("GET","query/insert/rate/rate_insert.php?rate_topic_id="+str,true);
xmlhttp.send();
}

</script>

