<style>
    .user{
        background-color: rgb(0,0,255,0.3);
    } 
    
</style>
<?php
include('sidebar.php');
 if(isset($_SESSION["admin_id"])){
     $where="" ;
     $selected="";
     $selected1='<option value="">Please Select</option>';

 }
elseif(isset($_SESSION["teacher_id"])){
    $where=" where course_id='".$_SESSION["course_id"]."'" ;
     $selected="selected";      
     $selected1="";      

}
?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>User Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>   
                                <th>Course Name</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image FilePath</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                    </table>
                </body> 
                
                
            </div>
        
          </div>
      </div>
    </main>

<!--Start Add  Modal -->

<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="a">
      <form method="post" id="form1" enctype="multipart/form-data" >
       <div class="form-group">
          <label for="recipient-name" class="col-form-label">Course Name:</label>
         <select  id="course_name" name="course_name" class="form-control" >
            <?php
              echo $selected1;
             ?>
           <?php
               $query="Select * from course ".$where." ";
               $result=mysqli_query($con,$query);
               while($row=mysqli_fetch_array($result)){
                   echo '<option '.$selected.'   value='.$row["course_id"].'>'.$row["course_name"].'</option>';
               }
             ?>
         </select>
     </div>   
         <div class="form-group" >
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" >
          </div>
        
          <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" >
                <input type="checkbox" onclick="showpass()" >Show password
          </div>
           <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" class="form-control" id="age" name="age" >
          </div>
           <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Address:</label>
               <textarea row="15" cols="50" class="form-control" id="address" name="address" ></textarea>
          </div>
           <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Gender:</label>
               <select id="gender" name="gender" class="form-control">
                 <option value="">Please Select</option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
               </select>
          </div>
           <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" >
          </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" >
          </div>
            <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" >
          </div>
          <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Image:</label>
                 <input type="file" name="file" id="file" size="50"  class="form-control"/><br>
                 <img id="profile_pic" height="150" width="150" src="" alt="No image" >


          </div>
     
       </form>      
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveAdd()">Add</button>
      </div>
    </div>
  </div>
</div>
       <!--End Add Modal -->
<!--Start Edit  Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Details</h5>
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
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
        fetch_data();
 })
 //shpw password
function showpass(){
		var x = document.getElementById("password");
		if(x.type === "password"){
			x.type = "text";
		
		}else{
			x.type = "password";
		
		}
	}  
function showpass1(){
		var x = document.getElementById("epassword");
		if(x.type === "password"){
			x.type = "text";
		
		}else{
			x.type = "password";
		
		}
	} 
//Start Load table
 function fetch_data(){ 
$('#myTable').DataTable({
    "pageLength": 10,
    "order":[],
            "ordering": false,

    "ajax":{    
            "url":"query/load/user/user_load.php",
            },
    } );        
 } 
//End Load table
    
//Start Open Modal Edit Details
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

xmlhttp.open("GET","query/load/user/user_load_details.php?user_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
 var form = document.getElementById("eform1");
    var data = new FormData(form);
    if(document.getElementById("eusername").value==""){
               alert("Please Type Username");
               return false;
           }
     if(document.getElementById("epassword").value==""){
               alert("Please Type Password");
               return false;
           }
     if(document.getElementById("ecourse_name").value==""){
               alert("Please Select Course");
               return false;
           }
     if(document.getElementById("eage").value==""){
               alert("Please Type Age");
               return false;
           }
     if(document.getElementById("eaddress").value==""){
               alert("Please Type Address");
               return false;
           }
     if(document.getElementById("egender").value==""){
               alert("Please Choose Gender");
               return false;
           }
     if(document.getElementById("ename").value==""){
               alert("Please Type Name");
               return false;
           }
     if(document.getElementById("eemail").value==""){
               alert("Please Type Email");
               return false;
           }
     if(document.getElementById("ephone").value==""){
               alert("Please Type Phone");
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
            if(xmlhttp.responseText=="1"){
               alert("Please Input jpg.file/png.file/jpeg.file");
            
        }
              if(xmlhttp.responseText==12){
               alert("Username has beed used");
            
        }else{
            alert("Edit Sucess");
            document.getElementById("b").innerHTML = xmlhttp.responseText;
            $('#editmodal').modal('hide');
            refresh_table();
        }
            
        }
    };
    xmlhttp.open("POST","query/edit/user/user_edit.php?username="+document.getElementById("eusername").value+
                  "&user_id="+document.getElementById("euser_id").value+
                  "&ecourse_name="+document.getElementById("ecourse_name").value+
                  "&password="+document.getElementById("epassword").value+
                  "&age="+document.getElementById("eage").value+
                  "&address="+document.getElementById("eaddress").value+
                  "&gender="+document.getElementById("egender").value+
                  "&name="+document.getElementById("ename").value+
                  "&email="+document.getElementById("eemail").value+
                  "&phone="+document.getElementById("ephone").value,
                  true);
    xmlhttp.send(data);
 }
// End Save Edit Data
    
    
// Open modal start
function addData(){
    $('#addmodal').modal('show');   
}   
// End modal start
    
function saveAdd(){
  var form = document.getElementById("form1");
    var data = new FormData(form);
      if(document.getElementById("course_name").value==""){
               alert("Please Select Course");
               return false;
           }
    if(document.getElementById("username").value==""){
               alert("Please Type Username");
               return false;
           }
     if(document.getElementById("password").value==""){
               alert("Please Type Password");
               return false;
           }
   
     if(document.getElementById("age").value==""){
               alert("Please Type Age");
               return false;
           }
     if(document.getElementById("address").value==""){
               alert("Please Type Address");
               return false;
           }
     if(document.getElementById("gender").value==""){
               alert("Please Choose Gender");
               return false;
           }
     if(document.getElementById("name").value==""){
               alert("Please Type Name");
               return false;
           }
     if(document.getElementById("email").value==""){
               alert("Please Type Email");
               return false;
           }
     if(document.getElementById("phone").value==""){
               alert("Please Type Phone");
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
        if(xmlhttp.responseText==12){
               alert("Username has beed used");
            
        }else{
            document.getElementById("course_name").value=""
            document.getElementById("username").value=""
            document.getElementById("password").value=""
            document.getElementById("age").value=""
            document.getElementById("address").value=""
            document.getElementById("gender").value=""
            document.getElementById("name").value=""
            document.getElementById("email").value=""
            document.getElementById("phone").value=""
            document.getElementById("email").value=""
            document.getElementById("file").value=""
            document.getElementById("profile_pic").src=""
                alert("Insert Success");
                $('#addmodal').modal('hide');
                refresh_table();
        }

    }
};
xmlhttp.open("POST","query/insert/user/user_insert.php?course_name="+document.getElementById("course_name").value+
             "&password="+document.getElementById("password").value+
             "&username="+document.getElementById("username").value+
             "&age="+document.getElementById("age").value+
             "&address="+document.getElementById("address").value+
             "&gender="+document.getElementById("gender").value+
             "&name="+document.getElementById("name").value+
             "&email="+document.getElementById("email").value+
             "&phone="+document.getElementById("phone").value
             ,true);
xmlhttp.send(data);
}
    

   
//Start Delete Data
function deleteAll($str){ 
 var xmlhttp;
 var ok = confirm("Are you sure want to Delete this record?");
    if(ok){
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Delete Sucess");
                    $('#myTable').DataTable().ajax.reload();

        }
    };
    xmlhttp.open("GET","query/delete/user/user_delete.php?user_id="+$str,true);
    xmlhttp.send();
    }
}
//End Delete Data
function refresh_table(){ 
      $('#myTable').DataTable().ajax.reload();
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