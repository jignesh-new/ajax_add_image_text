
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br>
<div class="offset-md-4 col-md-4" style="
    background-color: aliceblue;
    padding: 40px;
">
<?php echo validation_errors("<div style='color:red;'>","</div>");?>
<form class="form-horizontal" id="submit" >
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control"  name="fname" id="exampleInputEmail1" aria-describedby="emailHelp">
  
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control" name="lname">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone No</label>
    <input type="text" class="form-control" name="pno" pattern="['0-9']{10}" title="Enter A 10 Digit Number" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="filename">
  </div>
  <input type="submit" class="btn btn-primary" name="submit" >
</form>
</div>
<table class="table table-bordered table-sm" >
    <thead>
      <tr>
		<th>Sl No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
		    <th>image</th>
        <th>Edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody id="table-container">
      
    </tbody>
  </table>
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button> -->

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <div id="view">
          </div>
        
        </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>
  
</div>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script type="text/javascript">
function fetchdata()
{
    $.ajax(
    {
     url:'<?php echo base_url();?>hello/ajaxfetchdata',
     type:'post',
     success:function(data){
        $("#table-container").html(data);
     }
    });
}
fetchdata();
$(document).ready(function()
{
$('#submit').submit(function(e)
{
e.preventDefault();
$.ajax(
    {
     url:'<?php echo base_url();?>hello/ajaximage',
     type:'post',
     data:new FormData(this),
     processData:false,
     contentType:false,
     cache:false,
     async:false,
     success:function(data){
       
        fetchdata();
        $('#submit').reset();
     }
    }
)
});
});
</script>
<script type="text/javascript">
function fetchdata()
{
    $.ajax(
    {
     url:'<?php echo base_url();?>hello/ajaxfetchdata',
     type:'post',
     success:function(data){
        $("#table-container").html(data);
     }
    });
}
fetchdata();
$(document).ready(function()
{
$(document).on("click", ".delete", function() 
{
// e.preventDefault();
$.ajax(
    {
     url:'<?php echo base_url();?>hello/delete',
     type:'post',
     data:{id: $(this).attr("data-id")},
     success:function(data){
      // alert(data);
        fetchdata();
     }
    }
)
});
});
// $(document).ready(function()
// {
// $(document).on("click", ".edit", function() 
// {
// // e.preventDefault();
// $.ajax(
//     {
//      url:'<?php echo base_url();?>hello/editajax',
//      type:'post',
//      data:{id: $(this).attr("data-id")},
//      success:function(data){
//        console.log(data);
//         // ('#viewdata').html(data);
//         // alert("edit");
//      }
//     }
// )
// });
// });
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(document).on("click", ".edit", function() 
{
// e.preventDefault();
var id = $(this).attr("data-id");
// alert(id);
$.ajax(
    {
     url:'<?php echo base_url();?>hello/editajax',
     type:'post',
     data:{id:id},
     success:function(data){
      //  console.log(data);
        $('#view').html(data);
        // alert(data);
     }
    }
)
});
});
  </script>
