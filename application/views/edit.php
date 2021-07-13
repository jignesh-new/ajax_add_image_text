
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<br>
<div class="offset-md-4 col-md-4" style="background-color: aliceblue;padding: 40px;">
<?php echo validation_errors("<div style='color:red;'>","</div>");?>
<?php if(isset($output)){echo $output;}?>
<form action="<?php echo base_url();?>hello/editdata/<?php echo $edit->id;?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control"  name="fname" value="<?php echo $edit->fname;?>"    id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php echo form_error('fname');?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $edit->lname;?>" name="lname"  >
    <input type="hidden" class="form-control" value="<?php echo $edit->id;?>" name="id">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $edit->email;?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone No</label>
    <input type="text" class="form-control" name="pno" value="<?php echo $edit->pno;?>"   pattern="[0-9]{10}" title="Enter 10 Digit Number">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="filename">
    <input type="hidden" class="form-control" value="<?php echo $edit->image;?>" name="oldimage">
    <img src="<?php echo base_url();?>images/<?php echo $edit->image;?>" style="width:100px;height:100px;">
  </div>
  <input type="submit" class="btn btn-primary" name="submit">
</form>
</div>
<?php
$reg="/^[a-z]$/";
if(isset($_POST['submit']))
{
  if(preg_match($reg,$_POST['fname']))
  {
    $output="<div style='color:red;'>Fname Is Required</div>";

  }

}
?>
