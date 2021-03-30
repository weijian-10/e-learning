<?php
include('sidebar.php');
?>
<style>
    .teacher{
        background-color: rgb(0,0,255,0.3);
    } 
<?php
 if(isset($_SESSION["admin_id"])){
     echo '';
 }
elseif(isset($_SESSION["teacher_id"])){
         echo '.Divadd{display:none;}';
}
?>
</style>
<?php
 if(isset($_SESSION["admin_id"])){
     $edit='<th>Edit</th>';
    $delete='<th>Delete</th>';

 }
elseif(isset($_SESSION["teacher_id"])){
         $edit='';
        $delete='';
}
?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Teacher Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Teacher Name</th>
                                <th>Teacher Password</th>
                                <th>Course</th>
                                <?php 
                                echo $edit;
                                echo $delete;
                                ?>
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
            <label for="recipient-name" class="col-form-label">Course:</label>
           <select name="course_id" id="course_id" class="form-control">
               <option value="">Please Select</option>
              <?php
                    $query="Select * from course";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row["course_id"].'">'.$row["course_name"].'</option>';
                    }
               
               ?>
             
            </select> 
          
        </div>
         <div class="form-group" >
            <label for="recipient-name" class="col-form-label">Teacher Username:</label>
            <input type="text" class="form-control" id="ateacher_username" name="ateacher_username" >
          </div>
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">Teacher Password:</label>
            <input type="password" class="form-control" id="ateacher_password" name="ateacher_password" >
          </div>
         <div class="form-group" >
            <input type="checkbox" onclick="showpass()" >Show password
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
    
//Start Load table
 function fetch_data(){ 
$('#myTable').DataTable({
    "pageLength": 10,
    "order":[],
            "ordering": false,

    "ajax":{    
            "url":"query/load/teacher/teacher_load.php",
            },
    } );        
 } 
//End Load table
 //shpw password
function showpass(){
		var x = document.getElementById("ateacher_password");
		if(x.type === "password" ){
			x.type = "text";
		}else{
			x.type = "password";
		}
	} 
     //shpw password
function showpass1(){
		var x = document.getElementById("teacher_password");
		if(x.type === "password" ){
			x.type = "text";
		}else{
			x.type = "password";
		}
	} 
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

xmlhttp.open("GET","query/load/teacher/teacher_load_details.php?teacher_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
 if(document.getElementById("teacher_username").value==""){
               alert("Please Type Username");
               return false;
           }
    if(document.getElementById("teacher_password").value==""){
               alert("Please Type Password");
               return false;
           }
     if(document.getElementById("ecourse_id").value==""){
               alert("Please Choose Course");
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
            if(xmlhttp.responseText==2){
               alert("teacher username has been used");
           }
    
            document.getElementById("b").innerHTML = xmlhttp.responseText;
            $('#editmodal').modal('hide');
            alert("Edit Sucess");
            refresh_table();
            
        
        }
    };
    xmlhttp.open("POST","query/edit/teacher/teacher_edit.php?teacher_username="+document.getElementById("teacher_username").value+
                  "&teacher_password="+document.getElementById("teacher_password").value+
                  "&ecourse_id="+document.getElementById("ecourse_id").value+
                  "&teacher_id="+document.getElementById("teacher_id").value,
                  true);
    xmlhttp.send();
 }
// End Save Edit Data
    
    
// Open modal start
function addData(){
    $('#addmodal').modal('show');   
}   
// End modal start
    
function saveAdd(){

  if(document.getElementById("ateacher_username").value==""){
               alert("Please Type Username");
               return false;
           }
    if(document.getElementById("ateacher_password").value==""){
               alert("Please Type Password");
               return false;
           }
      if(document.getElementById("course_id").value==""){
               alert("Please Choose Course");
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
         if(xmlhttp.responseText==1){
               alert("teacher username has been used");
           }
             
        else{
             alert("Insert Success");
             $('#addmodal').modal('hide');
             document.getElementById("ateacher_username").value ="";   
             document.getElementById("ateacher_password").value ="";   
             document.getElementById("course_id").value ="";   
             refresh_table();
        }
      
    }
};
xmlhttp.open("GET","query/insert/teacher/teacher_insert.php?teacher_username="+document.getElementById("ateacher_username").value+
              "&teacher_password="+document.getElementById("ateacher_password").value+
              "&course_id="+document.getElementById("course_id").value
             ,true);
xmlhttp.send();
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
    xmlhttp.open("GET","query/delete/teacher/teacher_delete.php?teacher_id="+$str,true);
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