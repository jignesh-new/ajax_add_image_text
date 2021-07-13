<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<br>
<a style="float:right;width:200px;" href="<?php echo base_url();?>hello/view"  class="btn btn-primary">Add</a>
<br>
<br>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Phone No</th>
      <th scope="col">Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($ftc as $row){?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $row['fname'];?></td>
      <td><?php echo $row['lname'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['pno'];?></td>
      <td><img src="<?php echo base_url();?>images/<?php echo $row['image'];?>" style="width:100px;height:100px;"></td>
      <td><a href="<?php echo base_url();?>hello/edit/<?php echo $row['id']?>" class="btn btn-success">Edit</a>&nbsp;&nbsp;<a href="<?php echo base_url();?>hello/delete/<?php echo $row['id']?>" class="btn btn-danger"  onclick='confirm("Press a button!");'>Delete</a></td>
    </tr>
   <?php } ?> 
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if($this->session->flashdata('msg')){?>
<script>

swal({
  title: "<?php echo $this->session->flashdata('msg');?>",
  icon: "success",
  button: "cancel",
});
</script>
<?php } ?>