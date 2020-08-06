<?php include 'inc/header.php';

try{
if(isset($_POST['spass'])){
	$pass=$_POST['spass'];
	$view=$_POST['view'];
	$date=$_POST['date'];
	$mess=$_POST['message'];
	 $fileName=$_FILES["secure"]["name"];
  $size=$_FILES["secure"]["size"]/1024;
  $fileType=$_FILES["secure"]["type"];
   $fileTmpName=$_FILES["secure"]["tmp_name"]; 
   if ($size < 100001) {
  //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="Uploads/SecureShare/".$newFileName;

      if(move_uploaded_file($fileTmpName,$uploadPath)){
      	$story=true;
      	//update
      $com=mysqli_query($conn,"INSERT INTO `secureshare`(`file`, `pass`,`view`, `date`, `mess`) VALUES ('$uploadPath','$pass','$view','$date','$mess')");
      $nid="SELECT @@IDENTITY AS 'Identity';";
        $returnid=mysqli_query($conn,$nid);
        while($row=mysqli_fetch_array($returnid))
                {
                    $ident = $row['Identity'];
                    
                }
      //echo mysqli_error($conn);
      //success
      //echo $ident;
      //echo "<br> Inserted";
      $link=encryptt($ident);
      $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      $link=$actual_link."?s=".$link;
      //echo "<br>".$link;
      }else{
      	echo "<script>window.location.href='share?share=false'</script>";
      	//exit(1);
      }
      
}
else{
  //size ptblm
  $story=0;
  $link="";
  $pass="";
}
 
 ?>

<!-- Subscribe -->
        <section id="subscribe" class="section-9 odd subscription">
        	<?php //echo "inside"; ?>
            <div class="container smaller">
                <div class="row text-center intro">
                    <div class="col-12">
                    	 <h2 style="color: #5900ff;"><i class="icon icon-link"></i></h2>
                        <h2>Temporary Secure Share Link</h2>
                        <p class="text-max-800">you can share the file using this generated link.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <form action="" class="row m-auto items">
                            

                            <div class="col-12 col-lg-5 m-lg-0 input-group align-self-center item">
                                <input type="text" name="name" class="form-control field-name" value="<?php echo$pass;?>" placeholder="Password">
                            </div>
                            <div class="col-12 col-lg-5 m-lg-0 input-group align-self-center item">
                                <input type="text" id="link" name="link" value="<?php echo$link; ?>" class="form-control field-email" placeholder="Link">
                            </div>
                            <script type="text/javascript">
                            	function copy() {
			
		 var copyText = document.getElementById("link");
  		copyText.select();
  		copyText.setSelectionRange(0, 99999)
  		document.execCommand("copy");
		}
                            </script>
                            <div class="col-12 col-lg-2 m-lg-0 input-group align-self-center item">
                                <a onclick="copy()" class="btn primary-button w-100"> <i class="icon-share"></i> Copy</a>
                            </div>
                            <div class="col-12 text-center">
                                <span class="form-alert mt-5 mb-0"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php }elseif(isset($_GET['s'])){ 
    	$s=$_GET['s'];
    	
    	$s=decryptt($s);

    	$sefile=mysqli_query($conn,"SELECT * FROM secureshare WHERE id='$s'");
    	//$s=basename($s);
    	$secount=mysqli_num_rows($sefile);
    	$se=mysqli_fetch_array($sefile);
    	
    	
    	?>
    	<!-- Subscribe -->
        <section id="subscribe" class="section-9 odd subscription">
            <div class="container smaller">
                <div class="row text-center intro">
                    <div class="col-12">
                        <h2 style="color: #5900ff;"><i class="icon icon-link"></i></h2><h2> Temporary Secure Share Zone</h2>
                        <?php if($secount==1){
                        $filepath=$se['file'];
    	$f=explode("/",$filepath);
    	$filename=$f[2];
    	$date=$se['date'];
    	$view=$se['view'];
    	$time=$se['time'];
    	$mess=$se['mess'];
    	$pass=$se['pass'];


    	$offdiff=dtot($date); ?>
                        <p class="text-max-800"><?php echo$mess;?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                    	<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                        <form id="p" action="<?php echo$actual_link;?>" class="row m-auto items" method="post">
                            <?php 
                            if($offdiff<=0 || $view<=0){
                            	echo'<div class="col-12 text-center">
                                <span class="form-alert mt-5 mb-0"> Sorry ! This File is <b>Expired</b></span>
                            </div>';
    		//not allowed and delete the file and delete the db record
                            unlink($filepath);
                           mysqli_query($conn,"DELETE FROM secureshare WHERE id='$s'");
    	}else{
    		
                            ?>

                            <div class="col-12 col-lg-5 m-lg-0 input-group align-self-center item">
                                <input type="text" name="fname" class="form-control field-name" value="<?php echo $filename; ?>" placeholder="File Name">
                            </div>
                            <div class="col-12 col-lg-5 m-lg-0 input-group align-self-center item">
                                <input type="text" name="pass" id="pass"  class="form-control field-email" placeholder="Password">
                            </div>

                            <div class="col-12 col-lg-2 m-lg-0 input-group align-self-center item">
                                <a href="#" onclick="p.submit()" class="btn primary-button w-100"> <i class="icon-cloud-download"></i> Download</a>
                            </div>
                        <?php
                        if(isset($_POST['pass'])){
    		$ppass=$_POST['pass'];
    		if($ppass==$pass){
    			$view=$view-1;
    		mysqli_query($conn,"UPDATE secureshare SET view='$view' WHERE id='$s'");
    			echo'<div class="col-12 text-center"><span class="form-alert mt-5 mb-0" style="color:#06d755">The download will start automatically...<br> or <br><a class="btn mx-auto dark-button" href="'.$filepath.'" download><i class="icon-cloud-download"></i> Click here</a> </span> </div>';
    			echo '<script>
    			 var a = document.createElement("a");
        var url = "'.$filepath.'";
         a.href = url;
        a.download = '.$filename.';
        a.click(); </script>';
    		}else{
    			echo'<div class="col-12 text-center">
                                <span class="form-alert mt-5 mb-0"> Oops ! Password is Incorrect...	</span>
                            </div>';
    		}
    	}


                         } 
                        ?>
                            <div class="col-12 text-center">
                                <span class="form-alert mt-5 mb-0">	</span>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }else{ ?>
            	 <div class="col-12 text-center">
                                <span class="form-alert mt-5 mb-0">  Sorry ! This File is <b>Expired</b><?php echo$s;?>	</span>
                            </div>
                    </div>
                </div>
            <?php } 


            ?>
            </div>
        </section>
    	<?php } ?>
        <section id="services" class="section-4 odd offers featured left">
            <div class="container">
                
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
                        <div class="card featured">
                        	
                            <i class="icon icon-plus"></i>
                            <h4>See More</h4>
                            <p>Our Products</p>
                            <a  href="index#services"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        <?php }
        catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
include 'inc/footer.php'; ?>