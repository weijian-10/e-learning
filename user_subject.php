<?php
session_start();
   if(!isset($_SESSION["username"])) {
     header("location:index.php");
   }
?>
<?php
 include("navbar.php");
 include("db.php");

 $query="Select * from course where course_id='".$_GET["course_id"]."'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result);
?>

<style>
      .course{
        color:white;
    }
    @charset "ISO-8859-1";

@import url("https://use.fontawesome.com/releases/v5.0.11/css/all.css");

.Button {
	height: 50px;
	position: relative;
	background: #ccc;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 0px;
	left: 0px;
	right: 0px;
	width: 100%;
	overflow: hidden;
}

.nav-side-menu {
  overflow: auto;
  font-family: verdana;
  font-size: 12px;
  font-weight: 200;
  background-color: #2e353d;
  position: fixed;
  top: 0px;
  padding-left: 0px;
  height: 100%;
  width: 17%;
  color: #e1ffff;
}

.nav-side-menu .brand {
  background-color: #23282e;
  line-height: 50px;
  display: block;
  text-align: center;
  font-size: 14px;
}
.nav-side-menu .toggle-btn {
  display: none;
}
.nav-side-menu ul,
.nav-side-menu li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
}
.nav-side-menu ul :not(collapsed) .arrow:before,
.nav-side-menu li :not(collapsed) .arrow:before {
  font-family: 'Font Awesome 5 Free';
  content: "\f13a";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
  float: right;
  font-weight: 900;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
}
.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
  background-color: #181c20;
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0px;
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
  background-color: #020203;
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
  font-family: 'Font Awesome 5 Free';
  content: "\f105";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
  font-weight: 900;
}
.nav-side-menu li {
  padding-left: 0px;
  border-left: 3px solid #84a3c6;
  border-bottom: 1px solid #23282e;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #e1ffff;
}
.nav-side-menu li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 20px;
}
.nav-side-menu li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  -ms-transition: all 1s ease;
  transition: all 1s ease;
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #ffffff;
    color: #000;
    width: 40px;
    text-align: center;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {
    display: block;
  }
}
body {
  margin: 0px;
  padding: 0px;
}

</style>

<!------ Include the above in your HEAD tag ---------->
<div class="nav-side-menu" style="padding-top: 71px;">
<form method="POST">
    <div class="brand"><?php echo $row["course_name"] ?></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                
          <?php
                $query2="Select * from subject where course_id= '".$_GET["course_id"]."'";
                $result2=mysqli_query($con,$query2);
     
            ?>  
            <?php 
              while($row2=mysqli_fetch_array($result2))
              {      
            ?>
                <li  data-toggle="collapse" data-target="#<?php echo $row2["subject_name"]; ?>" class="collapsed ">
                        <a href="#"><i class="fab fa-studiovinari fa-lg"></i><?php echo $row2["subject_name"]; ?> <span class="arrow"></span></a>
                 </li>
                <ul class="sub-menu collapse" id="<?php echo $row2["subject_name"] ?>">
                <?php
                     $query3="SELECT * FROM `tutorial`inner JOIN subject ON tutorial.subject_id=subject.subject_id WHERE subject.subject_id='".$row2["subject_id"]."'";
                    $result3=mysqli_query($con,$query3);
                    while($row3=mysqli_fetch_array($result3)){
                ?>
            <li>
                 <button style="border:none;background:none;color:aliceblue" type="button" id="loadtutorialid" onclick=loadtutorialdetails(this.value); value="<?php echo $row3["tutorial_id"]; ?>"><?php echo $row3["tutorial_name"]; ?></button>
            </li>
                <?php
                    }
                ?>
                  
                </ul>

            <?php    
              }
            ?>
         
            </ul>
     </div>
    </form>
 
</div>
<div class="row" style="padding-top:171px;margin-left:500px"> 
  <div class="col-md-6">
    <div class="card">
      <div class="card-body" id="cb" >
         <h4>Please Choose a Subtitle on Left Sidebar</h4>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Start the Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="b">  
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveEdit()">Save</button>
      </div>
    </div>
  </div>
</div>
<script>
//SELECT * FROM `question` inner JOIN question_answer ON question.question_id=question_answer.question_id inner JOIN tutorial ON question.tutorial_id=tutorial.tutorial_id where question.question_id="8"

function rbtn(){   
    document.getElementById('radiobtn').checked = false; 
}
function openModal(str){
    var res = str.split(",");
  window.open("user_answer_question.php?ututorial_id="+res[0]+"&&usubject_id="+res[1]);
 }

function loadtutorialdetails(str){
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
         document.getElementById("cb").innerHTML = xmlhttp.responseText;

    }   
};

xmlhttp.open("GET","query/load/tutorial/user_tutorial_details.php?tutorial_id="+str,true);
xmlhttp.send();
}


function download_pdf(file){
        var link = document.getElementById('a');
        link.href = url;
        link.download = 'file.pdf';
        link.dispatchEvent(new MouseEvent('click'));
       
    } 
function apdf(){ 
    window.open("viewtutorialpdf.php?ututorial_id="+document.getElementById("ututorial_id").value);

}

</script>
