
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<br>
<div class="offset-md-4 col-md-4" style="
    background-color: aliceblue;
    padding: 40px;
">
<?php echo validation_errors("<div style='color:red;'>","</div>");?>
<form class="form-horizontal" id="submit">
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
    <input type="text" class="form-control" name="pno" pattern="['0-9']{10}" title="Enter A 10 Digit Number" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="filename">
  </div>
  <input type="submit" class="btn btn-primary" name="submit">
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
        <th>delete</th>
      </tr>
    </thead>
    <tbody id="table-container">
      
    </tbody>
  </table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        $('#configform')[0].reset();
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
        fetchdata();
     }
    }
)
});
});
</script>
