<?php
    session_start();

?>
<style>
    .course{
        background-color: rgb(0,0,255,0.3);
    } 
<?php
   if(isset($_SESSION["teacher_id"])){
       echo ".Divadd{display:none}";
   }
?>
</style>
<?php
include('sidebar.php');
   if(isset($_SESSION["teacher_id"])){
       $delete="";
   }
   if(isset($_SESSION["admin_id"])){
       $delete="<th>Delete</th>";
   }
?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Course Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Course Image Path</th>
                                <th>Edit</th>
                                <?php echo $delete; ?>
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
         <div class="form-group" >
            <label for="recipient-name" class="col-form-label">Course Name:</label>
            <input type="text" class="form-control" id="course_name" name="course_name" >
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
            "url":"query/load/course/course_load.php",
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

xmlhttp.open("GET","query/load/course/course_load_details.php?course_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
    var form = document.getElementById("eform1");
    var data = new FormData(form);
    if(document.getElementById("ecourse_name").value==""){
               alert("Please Type Course");
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
               alert("Course name has beed used");
           }else{
            alert("Edit Success");
            document.getElementById("b").innerHTML = xmlhttp.responseText;
            $('#editmodal').modal('hide');
            refresh_table();
        }
        }
    };
    xmlhttp.open("POST","query/edit/course/course_edit.php?ecourse_name="+document.getElementById("ecourse_name").value+
                  "&ecourse_id="+document.getElementById("ecourse_id").value,
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
               alert("Please Type Course");
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
               alert("Course name has beed used");
           }
         
        else{
                    alert("Insert Success");
                    $('#addmodal').modal('hide');
                    document.getElementById("course_name").value ="";   
                    document.getElementById("file").value ="";   
                    document.getElementById("profile_pic").src ="";   
                    refresh_table();
        }
      
    }
};
xmlhttp.open("POST","query/insert/course/course_insert.php?course_name="+document.getElementById("course_name").value,true);
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
    xmlhttp.open("GET","query/delete/course/course_delete.php?course_id="+$str,true);
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