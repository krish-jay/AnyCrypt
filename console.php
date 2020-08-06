<?php include 'inc/header.php'; 

 if (isset($_SESSION['aid'])) {
$session=$_SESSION['aid'];
 }else{
 	echo "<script> window.location.href='login' </script>";
 }
?>
<style>
* {
  box-sizing: border-box;
}

#cg{
	color: #5900ff;
}
#cg :hover{
	color: #fff;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 0px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
  color: #f5f5f1;

}
@media only screen and (max-width: 600px) {
	.header{
		display: none;
	}
                			table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 0px solid #f5f5f1; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 0px solid #f5f5f1; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}

                		}

#myTable tr {
  border-bottom: 1px solid #8e7d5a;
}
tr.header{
	background-color: #752bff;
	color: #fff;
}
tr.heade{
	background-color: #752bff;
	color: #fff;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #0d0d0d;
}
</style>
 <link rel="stylesheet" href="assets/js/vendor/datatables.min.css">
<section id="skills" class="section-4 odd counter skills featured left">
            <div class="container">
                <div class="row text-center intro">
                    <div class="col-12">
                    	<?php 
                        if (isset($_SESSION['aid'])) {
		$id=$_SESSION['aid'];
		$a=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
		$j=mysqli_fetch_array($a);
		$name=$j['name'];
	}
		?>
                        <h2><?php echo$name?>'s Console <b style="color: #5900ff; text-transform: capitalize;">(<i class="icon-lock"></i>)</b></h2>
                        <p class="text-max-800">Welcome to Any<b style="color: #5900ff; text-transform: capitalize;">C</b>rypt <b style="color: #5900ff; text-transform: capitalize;">(<i class="icon-lock"></i>)</b>, Here you can utilize Collection of Smart tools which are used to increase the vulnerability of the User's Uploaded Files.</p>
                    </div>
                </div>
                <div data-aos-id="counter" data-aos="fade-up" data-aos-delay="200" class="row justify-content-center text-center items">
                    <div class="col-12 col-md-12 col-lg-4 item">
                        <div data-percent="42" class="radial">
                            <span></span>
                        </div>
                        <h4>Consumption</h4>
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 item">
                        <div data-percent="60" class="radial">
                            <span></span>
                        </div>
                        <h4>Your Storage</h4>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 item">
                        <div data-percent="84" class="radial">
                            <span></span>
                        </div>
                        <h4>Balance Request</h4>
                    </div>
                   
                </div>
            </div>
        </section>
       
 <!-- Services -->
        <section id="services" class="section-4 odd offers featured left">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <h2 class="featured">Your Trackers</h2>
                        <p>Collection of Trackers on AnyCrypt platform Requests</p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <a href="trackers" class="btn mx-auto mr-md-0 ml-md-auto dark-button"><i class="icon-magnifier"></i>Search</a>
                    </div>
                </div>
                <div class="row justify-content-center text-center items">
                	<table >
 <tr class="header">
    <th >Track Id</th>
    <th >Filename</th>
    <th >Type</th>
    <th >Action</th>
  </tr>
 
  <tbody id="myTable">
  	<?php 
  	$a=mysqli_query($conn,"SELECT * FROM track WHERE user='$session' ORDER BY time DESC LIMIT 0,3");
  	
	while($r=mysqli_fetch_array($a)) {
		
  	?>

  <tr>
    <td> <i id="cg" class="icon-tag"></i> <?php echo$r['trackid'];?></td>
     <td> <i id="cg" class="icon-folder-alt"></i> <?php echo$r['filename'];?></td>
    <td><i id="cg" class="icon-bulb"></i> <?php echo ucwords($r['type']);?></td>
     <td><p><a class="btn mx-auto mr-md-0 ml-md-auto dark-button" href="trackers?track=<?php echo$r['trackid'];?>&type=<?php echo $r['type'];?>"><i class="icon-eye"></i>View</a> <a class="btn mx-auto mr-md-0 ml-md-auto dark-button" href="#"><i class="icon-trash"></i>Delete</a></p></td>
  </tr>
  <?php } ?>
  
  </tbody>
  <tr class="heade">
    <th colspan="5"><a style="color: #fff;" href="trackers"> Load More </a></th>
    
  </tr>
</table>
                    
                </div>
            </div>

        </section>


<script>
	function aa(){
		alert('aaa');
	}
	/*
function myFunction() {
  var input, filter, table, tr, td, i,temp, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  temp=tr[1].getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
  
  
}*/
var $rows = $('#myTable tr');
$('#myInput').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>

<?php include 'inc/footer.php'; ?>