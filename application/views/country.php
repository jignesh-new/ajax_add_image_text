<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<form method="post">
<select id="country" name="country">
    <option>select Country</option>
    <?php $query=$this->db->query('select * from country')->result(); foreach($query as $row){?>
    <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
    <?php } ?>
</select>
<select id="state">
<option>select state</option>
</select>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    //  alert("hello");
    $(document).ready(function(){
       
        $("#country").change(function() {
           var sid=$(this).val();
           alert(sid);
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>hello/state",
                data:{
                    sid:sid,
                },
                success:function(data)
                {
                    $("#state").html(data);
                }

            });

        });

    });
</script>