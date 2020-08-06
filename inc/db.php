<?php 

$conn=new mysqli("localhost","root","","anycrypt");
if($conn->connect_error)
{
	die("Connection failed.".$conn->connect_error);
}

?>
<script type="text/javascript">
     function logincheck() {   
                            var logincheck=1;
                            
                            $.ajax
                                ({
      type: 'post',
      url: 'inc/action.php',
      data: 
      {
         logincheck:logincheck,
         
      },
      success: function (response) 
      {
        $('#session').html(response);
  
      }
    });
                            }
</script>