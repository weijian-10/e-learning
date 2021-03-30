<style>
    .subject{
        background-color: rgb(0,0,255,0.3);
    } 
</style>
<?php
include('sidebar.php');
include('db.php');
if(isset($_SESSION["admin_id"])){
    $where="";
    
}elseif(isset($_SESSION["teacher_id"])){
    $where=" where course_id=".$_SESSION["course_id"]."";
}
echo $query="Select * from course ".$where." ";
$result=mysqli_query($con,$query);
?>
<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg">
        
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Subject Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Subject Name</th>
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
      <form method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course:</label>
            <select id="course_id" class="form-control">
                <option value="">Please Select</option>
              <?php
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<option value='.$row["course_id"].'>'.$row["course_name"].'</option>';
                    }
                ?>
              
            </select>
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject Name:</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" >
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
            "url":"query/load/subject/subject_load.php",
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

xmlhttp.open("GET","query/load/subject/subject_load_details.php?subject_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
    if(document.getElementById("esubject_name").value==""){
               alert("please type subject Name");
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
            if(xmlhttp.responseText==12){
               alert("Subject name has beed used");
           }
            else{
            document.getElementById("b").innerHTML = xmlhttp.responseText;
            alert("Edit Success");
            $('#editmodal').modal('hide');
            refresh_table();
            }
        }
    };
    xmlhttp.open("GET","query/edit/subject/edit_subject_query.php?subject_name="+document.getElementById("esubject_name").value+
                  "&subject_id="+document.getElementById("subject_id").value+
                  "&course_id="+document.getElementById("ecourse_id").value,
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
     if(document.getElementById("course_id").value==""){
               alert("Please Choose  Course");
               return false;
           }
    if(document.getElementById("subject_name").value==""){
               alert("Please type Subject Name");
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
             if(xmlhttp.responseText==12){
               alert("Subject name has beed used");
           }
        else{
            alert("Insert Success");
            $('#addmodal').modal('hide');
            document.getElementById("subject_name").value ="";   
            refresh_table();
        }
    }
};
xmlhttp.open("GET","query/insert/subject/subject_insert.php?subject_name="+document.getElementById("subject_name").value+
             "&course_id="+document.getElementById("course_id").value,true);
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
    xmlhttp.open("GET","query/delete/subject/delete_subject_query.php?subject_id="+$str,true);
    xmlhttp.send();
    }
}
//End Delete Data
function refresh_table(){ 
      $('#myTable').DataTable().ajax.reload();
}
    

</script>