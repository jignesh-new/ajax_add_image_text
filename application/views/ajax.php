
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CodeIgniter Upload Image File with preview using Jquery Ajax - XpertPhp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
	    <div class="row"> 
			<div class="col-sm-4 col-md-offset-4">
			<h4>Upload files using Codeigniter and Ajax</h4>
				<form class="form-horizontal" id="submit">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Title">
					</div>
					<div class="form-group">
						<input type="file" name="file">
					</div>
					<div class="form-group">
						<button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
					</div>
				</form>   
			</div>
		</div>
	    <div class="row"> 
			<div class="col-sm-4 col-md-offset-4" id="uploaded_image">  
			</div>
		</div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#submit').submit(function(e){
            e.preventDefault(); 
            // alert('dsds');
			 $.ajax({
				url:'<?php echo base_url();?>hello/ajax',
				type:"post",
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data){
					$('#uploaded_image').html(data); 
				}
			});
        });
    });
</script>
</body>
</html>
