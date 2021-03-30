<?php
session_start();
   if(!isset($_SESSION["username"])) {
     header("location:index.php");
   }
?>
<?php
require("db.php");
require("headerlink.php");
session_start();
$subject_query="Select * from subject where subject_id='".$_GET["usubject_id"]."'";
$subject_result=mysqli_query($con,$subject_query);
$subject_row=mysqli_fetch_array($subject_result);
$subject_name=$subject_row["subject_name"];

$query22="Select * from user where user_id='".$_SESSION["user_id"]."' ";
$result22=mysqli_query($con,$query22);
$row22=mysqli_fetch_array($result22);
?>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" style="color:white;"><h2><?php echo $row22["username"]; ?></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                       
                        <li class="nav-item" style="margin-left:650px">
                            <a class="nav-link" ><h2 class="index">Subject Name:<?php echo $subject_name; ?></h2> <span class="sr-only">(current)</span></a>
                        </li>   
                        <li class="nav-item">
                        </li>
                    
                    </ul>
                    <form class="form-inline mt-2 mt-md-0">

                    </form>
                </div>  
            </nav>
<br><br><br>

<main class="l-main">
    <div style="margin-left:30px">
        <i class="fa fa-clock-o fa-2x"> <label id="minutes">00</label>:<label id="seconds">00</label></i><br>
        <button class="btn btn-outline-info" id="timer" onclick="startTimer()"  >Start</button>
        <input type="hidden" name="tutorial_id" id="tutorial_id" value="<?php echo $_GET["ututorial_id"]; ?>" >
    </div>
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group" >
            <div href="#" class="list-group-item" id="exam_question">
               <h4>Press Start Button To Begin The Exercise</h4> 
            </div>
                
        </div>
      </div>
</main>


<script>
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = 0;
    
    var num=1;
    function stopTimer(){
        num=0;
    }
    
    function setTime(){
        totalSeconds+=num;
        secondsLabel.innerHTML = pad(totalSeconds % 60);
        minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }
  
     
    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }
    
function startTimer(){
    // Set the date we're counting down to
    setInterval(setTime, 1000);
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
            if(xmlhttp.responseText==1){
                alert(1);
             }
           document.getElementById("exam_question").innerHTML = xmlhttp.responseText;
                document.getElementById("timer").style.display = "none";


        }   
    };

xmlhttp.open("GET","query/load/question/question_load_user_question.php?ututorial_id="+document.getElementById("tutorial_id").value,true);
xmlhttp.send();
}

  

function Next(){
    
    var num=document.getElementById("no").innerHTML;
    var num_question=document.getElementById("no").innerHTML;
    num_question;
    num++;
    if(document.getElementById("qa_answer1").checked==true){
        var choose_answer=document.getElementById("qa_answer1").value
    }
     else if(document.getElementById("qa_answer2").checked==true){
        var choose_answer=document.getElementById("qa_answer2").value
    }
    else if(document.getElementById("qa_answer3").checked==true){
        var choose_answer=document.getElementById("qa_answer3").value
    }
    else if(document.getElementById("qa_answer4").checked==true){
        var choose_answer=document.getElementById("qa_answer4").value
    }
    else{
        alert("please pick the answer before go to the next question"); return 
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
            document.getElementById("exam_question").innerHTML = xmlhttp.responseText;
    }   
};

xmlhttp.open("GET","query/load/question/question_load_user_question.php?nquestion_id="+document.getElementById("question_id").value+
             "&ntutorial_id="+document.getElementById("tutorial_id").value+
             "&count="+num+
             "&num_question="+num_question+
             "&choose_answer="+choose_answer,true);
xmlhttp.send();
}
    

function choose_answer(str){
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
        
    }   
};

xmlhttp.open("GET","query/insert/question/question_insert_answer_question.php?question_id="+document.getElementById("question_id").value+
             "&tutorial_id="+document.getElementById("tutorial_id").value+
             "&choose_answer="+str
             ,true);
xmlhttp.send();
    
}
function checkAnswer(){
 var minutes=document.getElementById("minutes").innerHTML;
 var seconds=document.getElementById("seconds").innerHTML;
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
            stopTimer();
            alert("result upload success");
            document.getElementById("exam_question").innerHTML = xmlhttp.responseText;
//            document.getElementById("exam_question2").innerHTML = xmlhttp.responseText;
    }   
};

xmlhttp.open("GET","query/load/question/question_load_user_answer.php?tutorial_id="+document.getElementById("tutorial_id").value+
              "&minutes="+minutes+
              "&seconds="+seconds,true);
xmlhttp.send();
}

    
</script>


