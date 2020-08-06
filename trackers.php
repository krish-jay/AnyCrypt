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
  background-color: #752bff;
}
</style>
 <link rel="stylesheet" href="assets/js/vendor/datatables.min.css">


      <?php if (!(isset($_GET['track']))) {
        
       ?>
 <!-- Services -->
        <section id="services" class="section-4 odd offers featured left">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <h2 class="featured">Your Trackers</h2>
                        <p>Collection of Trackers on AnyCrypt platform Requests</p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <br><input id="myInput" type="text" class="form-control" placeholder="Search" required>
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
  	$a=mysqli_query($conn,"SELECT * FROM track WHERE user='$session' ORDER BY time DESC");
  	$to=mysqli_num_rows($a);
     if($to==0){
       echo '<tr>
    <td colspan="6"> <center> No Trackers found ! </center> </td>
  </tr>';
    }else{
	while($r=mysqli_fetch_array($a)) {
		
  	?>

  <tr>
    <td> <i id="cg" class="icon-tag"></i> <?php echo$r['trackid'];?></td>
     <td> <i id="cg" class="icon-folder-alt"></i> <?php echo$r['filename'];?></td>
    <td><i id="cg" class="icon-bulb"></i> <?php echo ucwords($r['type']);?></td>
     <td><p><a class="btn mx-auto mr-md-0 ml-md-auto dark-button" href="?track=<?php echo$r['trackid'];?>&type=<?php echo $r['type'];?>"><i class="icon-eye"></i>View</a> <a class="btn mx-auto mr-md-0 ml-md-auto dark-button" href="#"><i class="icon-trash"></i>Delete</a></p></td>
  </tr>
  <?php } ?>
  
  </tbody>
  <tr class="heade">
    <th colspan="5"><a style="color: #fff;" href="#"> Go To Top </a></th>
    
  </tr>
<?php }?>
</table>
                    
                </div>
            </div>

        </section>
<?php }elseif(isset($_GET['track']) && isset($_GET['type'])){ 
  $trackid=$_GET['track'];
  $type=$_GET['type'];
  ?>
<!-- Services -->
        <section id="trackerss" class="section-4 odd offers featured left">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <h2 class="featured">Track Id : <b style="color: #5900ff;">#</b><?php echo$trackid;?></h2>
                        <p>Collection of Trackers on AnyCrypt platform Requests</p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <br><input id="myInput" type="text" class="form-control" placeholder="Search" required>
                    </div>
                </div>
                <div class="row justify-content-center text-center items">
                  <table >
 <tr class="header">
    <th >#</th>
     <th >Browser</th>
    <th >Location</th>
    <th >ISP</th>
    <th >IPtype</th>
    <th >Time</th>
  </tr>
 
  <tbody id="myTable">
    <?php 
    $a=mysqli_query($conn,"SELECT * FROM locations WHERE trackid='$trackid' ORDER BY time DESC");
    $i=0;
    $to=mysqli_num_rows($a);
    if($to==0){
       echo '<tr>
    <td colspan="6"> <center> No Views ! </center> </td>
  </tr>';
    }else{
  while($r=mysqli_fetch_array($a)) {
    $i++;
    $ip=$r['location'];
    $json=file_get_contents("https://extreme-ip-lookup.com/json/$ip");
extract(json_decode($json,true));
//$country,$region,$city,$isp,$ipType

    ?>

  <tr>
    <td> <i id="cg" class="icon-tag"></i> <?php echo$i;?></td>
    <td> <i id="cg" class="icon-globe"></i> <?php echo$r['browser'];?></td>
     <td> <i id="cg" class="icon-location-pin"></i> <?php echo$city;?>,<?php echo$region;?>,<?php echo$country;?></td>
    <td><i id="cg" class="icon-bulb"></i> <?php echo $isp;?></td>
    <td><i id="cg" class="icon-bulb"></i> <?php echo $ipType;?></td>
     <td><i id="cg" class="icon-bulb"></i> <?php echo $r['time'];?></td>
  </tr>
  <?php } ?>
  
  </tbody>
  <tr class="heade">
    <th colspan="5"><a style="color: #fff;" href="#"> Go To Top </a></th>
    
  </tr>
<?php }?>
</table>
                    
                </div>
            </div>

        </section>

        <!-- Services -->
        <section id="services" class="section-4 odd offers featured left">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <h2 class="featured">Our Products</h2>
                        <p>Collection of Applications provided under AnyCrypt platform</p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <a data-toggle="modal" data-target="#search" href="#" class="btn mx-auto mr-md-0 ml-md-auto dark-button"><i class="icon-magnifier"></i>Search</a>
                    </div>
                </div>
                <div class="row justify-content-center text-center items">
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card featured">
                            <i class="icon icon-lock"></i>
                            <h4>File Encryption</h4>
                            <p>AES,DES,TripleDES</p>
                            <a href="#" data-toggle="modal" data-target="#encrypt"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-key"></i>
                            <h4>File Decryption</h4>
                            <p>AES,DES,TripleDES</p>
                            <a href="#" data-toggle="modal" data-target="#decrypt"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                     <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-link"></i>
                            <h4>Temporary Links</h4>
                            <p>Self Destruction File Sharing</p>
                            <a data-toggle="modal" data-target="#links" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-location-pin"></i>
                            <h4>File Tracking</h4>
                            <p>Last Utilized / Decrypted location </p>
                            <a data-toggle="modal" data-target="#more" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-folder-alt"></i>
                            <h4>Analyse File</h4>
                            <p>Encryption and other details</p>
                            <a data-toggle="modal" data-target="#more" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card featured">
                          
                            <i class="icon icon-picture"></i>
                            <h4>Hide<i style="color: #5900ff;">ON</i></h4>
                            <p>Hide your Message in any Image</p>
                            <a data-toggle="modal" data-target="#hideon" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>
<?php } ?>
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