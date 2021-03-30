    <style>
        .tutorial{
            background-color: rgb(0,0,255,0.3);
        } 
    </style>
<?php
include("sidebar.php");
include("db.php");
?>
<?php
function load_course(){
    include("db.php");
    session_start();
    if(isset($_SESSION["admin_id"])){
        $where="";
    }
    elseif(isset($_SESSION["teacher_id"]))
    {
        $where=" where course_id='".$_SESSION["course_id"]."'";
    }
    $query2="Select * from course ".$where." ";
    $result2=mysqli_query($con,$query2);
    $output="";
        while($row2=mysqli_fetch_array($result2))
        {
            $output .= '<option  value='.$row2["course_id"].'>'.$row2["course_name"].'</option>';
        }
    return $output;
                 
}
 ?>
                

<main class="l-main">
      <div class="content-wrapper content-wrapper--with-bg"> 
        <div class="list-group">
            <div href="#" class="list-group-item">
                
                <body>
                    <h2>Subtitle Page</h2>
                    
                    <hr>
                    <table width="100%" id="myTable"  class="table table-striped" >
                        <thead>  
                            <tr> 
                                <th>Course Name</th>
                                <th>Subject_Name</th>
                                <th>Subtitle Name</th>
                                <th>FilePath</th>
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
<script>

</script>
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
      <form method="post" id="form1" enctype="multipart/form-data" action="query/insert/tutorial/tutorial_insert.php" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course Name:</label>
              <select name="course_name" id="course_name" class="form-control">
                   <option value="">Please Select</option>
                   <?php echo load_course(); ?>
                 
                  
              </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject:</label>
              <select name="subject_id" id="subject_id" class="form-control">
                  <option value="">Please Select</option>
               
              </select>
          </div>
          
           <div class="form-group">
               <label for="recipient-name" class="col-form-label">Subtitle Name:</label>
               <input type="text" name="tutorial_name" id="tutorial_name" class="form-control">
          </div>
         
             <div class="form-group">
                 <label for="recipient-name" class="col-form-label">FilePath:</label>
                 <input type="file" name="file" id="file" size="50"  class="form-control"/>

          </div>
<!--
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tutorial_description:</label>
             <textarea name="tutorial_desc" id="tutorial_desc" rows="10" cols="50" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tutorial_example:</label>
             <textarea name="tutorial_example" id="tutorial_example" rows="10" cols="50" class="form-control"></textarea>
          </div>
-->
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
            "url":"query/load/tutorial/tutorial_load.php",
            },
    } );        
 } 
//End Load table
$('#course_name').change(function(){
          var course_name=$(this).val();
          $.ajax({
              url:"query/load/tutorial/tutorial_load_subject.php",
              method:"POST",
              data:{course_name:course_name},
              dataType:"text",
              success:function(data)
              {
                  $('#subject_id').html(data);
              }
          });
      });
function loadCourse(){
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
            document.getElementById("esubject_id").innerHTML=xmlhttp.responseText;
    }
};

xmlhttp.open("GET","query/load/tutorial/tutorial_load_subject.php?ecourse_name="+document.getElementById("ecourse_name").value,true);
xmlhttp.send();
}
function refresh_table(){ 
      $('#myTable').DataTable().ajax.reload();
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
         if(xmlhttp.responseText=="1"){
               alert("Please Input jpg.file/png.file/jpeg.file");
            
        }else{
         document.getElementById("b").innerHTML = xmlhttp.responseText;
         $('#editmodal').modal('show');
        }
    }
};

xmlhttp.open("GET","query/load/tutorial/tutorial_load_details.php?tutorial_id="+str,true);
xmlhttp.send();
}
//End Open Modal Edit Details

// Start Save Edit Data
function saveEdit(){
    if(document.getElementById("ecourse_name").value=="")
        {
               alert("Please Choose  Course Name");
               return false;
        }
    if(document.getElementById("esubject_id").value=="")
        {
               alert("Please Choose subject Name");
               return false;
        }
if(document.getElementById("etutorial_name").value=="")
        {
               alert("Please type Subtitle Name");
               return false;
        }

 var form = document.getElementById("eform1");
    var data = new FormData(form);
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
            alert("Please insert file.pdf");

        }
          if(xmlhttp.responseText==12){
               alert("Subtitle name has beed used");
           }
          else{
            alert("Edit Success");
            $('#editmodal').modal('hide');
            refresh_table();
          }
      
    }
    };
    xmlhttp.open("POST","query/edit/tutorial/tutorial_edit.php?ecourse_name="+document.getElementById("ecourse_name").value+
                  "&etutorial_name="+document.getElementById("etutorial_name").value+
                  "&etutorial_id="+document.getElementById("etutorial_id").value+
                  "&esubject_id="+document.getElementById("esubject_id").value, true);
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
    var xmlhttp=new XMLHttpRequest();
   if(document.getElementById("course_name").value=="")
        {
               alert("Please Choose  Course Name");
               return false;
        }
    if(document.getElementById("subject_id").value=="")
        {
               alert("Please Choose subject Name");
               return false;
        }
if(document.getElementById("tutorial_name").value=="")
        {
               alert("Please type Subtitle Name");
               return false;
        }
//if(document.getElementById("file").value=="")
//        {
//               alert("Please insert file.pdf");
//               return false;
//        }

    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
 xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        if(xmlhttp.responseText == "PDF_FILE"){
            alert("Upload Pdf file Only");
        }
//        if(xmlhttp.responseText==12){
//               alert("Subtitle name has beed used");
//           }
        else{
                 var ok = confirm("Are you sure want to continue this record?");
            if(ok){
                  alert("Insert Success");
                $('#addmodal').modal('hide');
                document.getElementById("file").value="";
//                document.getElementById("course_name").value=""
//                document.getElementById("subject_id").value=""
                document.getElementById("tutorial_name").value=""
            refresh_table();
            }
            else{
             alert("Insert Success");
            $('#addmodal').modal('hide');
            document.getElementById("file").value="";
            document.getElementById("course_name").value=""
            document.getElementById("subject_id").value=""
            document.getElementById("tutorial_name").value=""
            refresh_table();
            }
          
      }
    }
};
xmlhttp.open("POST","query/insert/tutorial/tutorial_insert.php?subject_id="+document.getElementById("subject_id").value+
             "&tutorial_name="+document.getElementById("tutorial_name").value,true);
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
            alert("delete success");
            refresh_table();
        }
    };
    xmlhttp.open("GET","query/delete/tutorial/tutorial_delete.php?tutorial_id="+$str,true);
    xmlhttp.send();
    }
}
//End Delete Data
function apdf(str){ 
    window.open("viewpdf.php?etutorial_id="+str);

}


</script>