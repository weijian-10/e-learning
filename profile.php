<?php
require("navbar.php");
require("db.php");

?>
<style>
    body{
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
</style>
<?php
$id=""; 
$name="";
$address="";
$age="";
$name="";
$gender="";
$course="";
$email="";
$phone="";
$image="";
 $query="SELECT * FROM `user` inner join course on user.course_id=course.course_id WHERE user.user_id='".$_SESSION["user_id"]."'";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
    $id=$row["user_id"];       
    $name=$row["name"];       
    $address=$row["address"];       
    $age=$row["age"];       
    $gender=$row["gender"];       
    $course=$row["course_name"];       
    $email=$row["email"];       
    $phone=$row["phone"];       
    $image=$row["image"];           
    $username=$row["username"];           
}

 if($image == ""){
     $img =  "<img src='pic/unknown-avatar.jpg' />";
}else{
     $img =  "<img src='$image' />";
}

?>

<div class="container emp-profile">
    
    <form method="post">
     
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <?php
                    echo $img;
                    ?>                      
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h2>
                       Username: <?php echo $username; ?>
                    </h2>
                   <div style="height:70px"></div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <button type="button"  class="profile-edit-btn" onclick="editData(this.value)" value="<?php echo $id; ?>">Edit Profile</button><br><br>
                <button type="button"  class="profile-edit-btn" onclick="checkResult(this.value)" value="<?php echo $id; ?>">Check Result</button>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!--
<div class="profile-work">
<p>WORK LINK</p>
<a href="">Website Link</a><br/>
<a href="">Bootsnipp Profile</a><br/>
<a href="">Bootply Profile</a>
<p>SKILLS</p>
<a href="">Web Designer</a><br/>
<a href="">Web Developer</a><br/>
<a href="">WordPress</a><br/>
<a href="">WooCommerce</a><br/>
<a href="">PHP, .Net</a><br/>
</div>
-->
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Username</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $username; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php  echo $name ;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $email; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Age</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $age; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $phone; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Course</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php  echo $course;?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php  echo $gender;?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>           
</div>
<!--Start Edit  Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
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
<!--End Edit Modal -->

<script>
function showpass(){
		var x = document.getElementById("password");
		if(x.type === "password"){
			x.type = "text";
		}else{
			x.type = "password";
		}
	}
    function editData(str){
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
                
                document.getElementById("b").innerHTML = xmlhttp.responseText;
                $('#editmodal').modal('show');
                
            }
        };
        
        xmlhttp.open("GET","query/load/profile/profile_load_details.php?user_id="+str,true);
        xmlhttp.send();
    }
    //End Open Modal Edit Details
    
    // Start Save Edit Data
    function saveEdit(){
        var form = document.getElementById("eform1");
        var data = new FormData(form);
        //    if(document.getElementById("ecourse_name").value==""){
        //               alert("please type subject");
        //               return false;
        //           }
        
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
                if(xmlhttp.responseText=="1"){
                    alert("Please Input jpg.file/png.file/jpeg.file");

           }
            else{
                alert("Success");
                $('#editmodal').modal('hide');
                window.location.href="profile.php";
                
                }
                
            }
        };
        xmlhttp.open("POST","query/edit/profile/profile_edit.php?username="+document.getElementById("username").value+
                     "&user_id="+document.getElementById("user_id").value+
                     "&password="+document.getElementById("password").value+
                     "&name="+document.getElementById("name").value+
                     "&age="+document.getElementById("age").value+
                     "&address="+document.getElementById("address").value+
                     "&gender="+document.getElementById("gender").value+
                     "&course="+document.getElementById("course").value+
                     "&email="+document.getElementById("email").value+
                     "&phone="+document.getElementById("phone").value,
                     true);
        xmlhttp.send(data);
    }
    // End Save Edit Data
    function checkResult(str){ 
    window.open("checkresult.php?user_id");

}
</script>