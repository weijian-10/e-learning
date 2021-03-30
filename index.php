<!doctype html>
<html lang="en">
        
    <style>
        img.blur{
            filter: blur(7px);
        }
        .index{
            color: white;
        }
    </style>


    <body>
    <?php include("navbar.php"); include("db.php");?>
        
        <main role="main">
            
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
<!--                    <li data-target="#myCarousel" data-slide-to="2"></li>-->
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide blur" src="image/girl_studying-wallpaper-1440x900%20(1).jpg" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption">
                             <h1>Are you tired of reading books?</h1>
                                <p> Let's start our E-Learning Tutorial</p>
                                <p><?php echo $getstarted ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="image/communication-wallpapers_597478276.jpg" alt="Second slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Forum</h1>
                                <p>A forum is a place, a situation, or group in which student exchange ideas and discuss exercise, especilly important subject</p>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="carousel-item">
                        <img class="third-slide" src="image/wp3205204.jpg" alt="Third slide">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>One more for good measure.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
-->
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
            
            <!-- Marketing messaging and featurettes
================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
            
            <div class="container marketing">
                

                
                <hr class="featurette-divider">
                
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Start the tutorial </h2>
                        <p class="lead">You can choose your favourite course like Progamming,Accunting,Multimeda and ect</p>
                    </div>
                    <div class="col-md-5" style="padding-top:80px">
                        <img class="featurette-image img-fluid mx-auto" src="image/online-test-computer-illustration.jpg" alt="Generic placeholder image">
                    </div>
                </div>
                    
                <hr class="featurette-divider">
                
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Forum</h2>
                        <p class="lead">Dicuss question with other to learn more.</p>
                    </div>
                    <div class="col-md-5 order-md-1" style="padding-top:80px">
                        <img class="featurette-image img-fluid mx-auto" src="image/images.png" alt="Generic placeholder image">
                    </div>
                </div>
                
                <hr class="featurette-divider">
                
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Improve Skill </h2>
                        <p class="lead">You can improve skill by read the tutorial and do the exercise.</p>
                    </div>
                    <div class="col-md-5" style="padding-top:80px">
                        <img class="featurette-image img-fluid mx-auto" src="image/the_one_thing_improve_skills.jpg" alt="Generic placeholder image">
                    </div>
                </div>
                
                <hr class="featurette-divider">
                
                <!-- /END THE FEATURETTES -->
                
            </div><!-- /.container -->
            <?php require("about.php"); ?>
            
            <!-- FOOTER -->
            <footer class="container">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>
        </main>
                <!-- Start Login modal -->

    <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="b">  
                <form method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                   
                        <div class="form-group">
								<input type="checkbox" onclick="showpass()">Show Password
				        </div>
                </form>   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="saveLogin()">Login</button>
            </div>
          </div>
        </div>
    </div>
     <!-- End login modal -->

        <!-- Start register modal -->
<div class="modal fade" id="registermodal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="b">  
      <form method="post" id="form1" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="r_username" name="r_username">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="r_password" name="r_password">
                             <input type="checkbox" onclick="showpass1()">Show Password

                        </div>
                     <div class="form-group">
                            <label for="message-text" class="col-form-label">Course:</label>
                         <select id="r_course" name="r_course" class="form-control">
                             <option value="">Please Select</option>
                         <?php
                                $c_query="Select * from course";
                                $c_result=mysqli_query($con,$c_query);
                                while($c_row=mysqli_fetch_array($c_result)){
                          ?>
                              <option value="<?php echo $c_row["course_id"]; ?>"><?php echo $c_row["course_name"] ?></option>
                         <?php
                          }
                         ?>
                             </select>
                         </div>
                     <div class="form-group">
                            <label for="message-text" class="col-form-label">Age:</label>
                            <input type="text" class="form-control" id="r_age" name="r_age">
                        </div>
                    <div class="form-group">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="r_address" name="r_address">
                        </div>
                    <div class="form-group">
                         <label for="message-text" class="col-form-label">Gender:</label>
                            <select id="r_gender" name="r_gender" class="form-control">
                             <option value="">Please Select</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                        </div>
                    <div class="form-group">
                            <label for="message-text" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="r_name" name="r_name">
                        </div>
                      <div class="form-group">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="r_email" name="r_email">
                        </div>
                      <div class="form-group">
                            <label for="message-text" class="col-form-label">Phone:</label>
                            <input type="text" class="form-control" id="r_phone" name="r_phone">
                        </div>
                       <div class="form-group">
                            <label for="message-text" class="col-form-label">Profile Image:</label>
                            <input type="file" name="file" id="file" size="50"  class="form-control"/><br>
                           <img id="profile_pic" height="150" width="150" src="" alt="No image" >

                        </div>
                               
          
                </form>   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="saveRegister()">Register</button>
            </div>
          </div>
        </div>
</div>
    <!--End register modal -->
    </body>
</html>

<script>
function showpass(){
		var x = document.getElementById("password");
		if(x.type === "password"){
			x.type = "text";
		}else{
			x.type = "password";
		}
	}
function showpass1(){
		var x = document.getElementById("r_password");
		if(x.type === "password"){
			x.type = "text";
		}else{
			x.type = "password";
		}
	}
function saveRegister(){
       var form = document.getElementById("form1");
    var data = new FormData(form);
       if(document.getElementById("r_username").value==""){
               alert("Please type username");
               return false;
           }
         if(document.getElementById("r_password").value==""){
               alert("Please type password");
               return false;
           }
    if(document.getElementById("r_course").value==""){
               alert("Please Choose Course");
               return false;
           }
    if(document.getElementById("r_age").value==""){
               alert("Please type Age");
               return false;
           }
    if(document.getElementById("r_address").value==""){
               alert("Please type Address");
               return false;
           }
    if(document.getElementById("r_gender").value==""){
               alert("Please Choose Gender");
               return false;
           }
    if(document.getElementById("r_name").value==""){
               alert("Please type Name");
               return false;
           }
    if(document.getElementById("r_email").value==""){
               alert("Please type Email");
               return false;
           }
    if(document.getElementById("r_phone").value==""){
               alert("Please type Phone");
               return false;
           }
      if(document.getElementById("file").value==""){
               alert("Please Input jpg.file/png.file/jpeg.file");
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
        if(xmlhttp.responseText=="wrongimage"){
               alert("Please Input jpg.file/png.file/jpeg.file");
        }
                  if(xmlhttp.responseText=="12"){
               alert("Username has beed used");
           }
        else{
         alert("Register Success");
         $('#registermodal').modal('hide');
        document.getElementById("r_username").value ="";   
        document.getElementById("r_password").value ="";
        document.getElementById("r_age").value ="";
        document.getElementById("r_course").value ="";
        document.getElementById("r_gender").value ="";
        document.getElementById("file").value ="";
        document.getElementById("r_address").value ="";
        document.getElementById("r_name").value ="";
        document.getElementById("r_email").value ="";
        document.getElementById("r_phone").value ="";
        document.getElementById("profile_pic").src ="";
    }
    }
};

xmlhttp.open("POST","query/insert/useraccount/useraccount_insert.php?r_username="+document.getElementById("r_username").value +
"&r_password="+document.getElementById("r_password").value+
"&r_password="+document.getElementById("r_age").value+
"&r_address="+document.getElementById("r_address").value+
"&r_gender="+document.getElementById("r_gender").value+
"&r_name="+document.getElementById("r_name").value+
"&r_email="+document.getElementById("r_email").value+
"&r_course="+document.getElementById("r_course").value+
"&r_phone="+document.getElementById("r_phone").value
,true);
xmlhttp.send(data);
}  
    
function saveLogin(){
       if(document.getElementById("username").value==""){
               alert("please type username");
               return false;
           }
         if(document.getElementById("password").value==""){
               alert("please type password");
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
        if(xmlhttp.responseText=="success"){
            alert("Login success"); 
            window.location.href="user_course.php";

        }
        else {
            alert("Please type your username or password correctly");

      }
    }
};

xmlhttp.open("GET","query/login_user_query.php?username="+document.getElementById("username").value + "&password="+document.getElementById("password").value,true);
xmlhttp.send();
}  
function logoutConfirm(){
    var conf = confirm('Are you sure want to logout?');
   if(conf)
      window.location.href="logout.php";
}
 function readURL(input){
    if(input.files && input.files[0]){
          var reader=new FileReader();
          
          reader.onload=function(e){
              $('#profile_pic').attr('src',e.target.result);
              
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $("#file").change(function(){
      readURL(this);
      
  }); 
</script>