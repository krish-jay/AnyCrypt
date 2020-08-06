<?php include 'inc/header.php';  ?>

   <!-- Contact -->
        <section id="contact" class="section-8 odd form">
            <div class="container">
                <form action="" id="leverage-form" class="multi-step-form">
                    

                   
                    <!-- Remove this field if you want to disable recaptcha -->

                    <div class="row">
                        <div class="col-12 col-md-6 align-self-start text-center text-md-left">

                            <!-- Success Message -->
                            <div class="row success message">
                                <div class="col-12 p-0">
                                    <div class="wait">
                                        <div class="spinner-grow" role="status">
                                            <span class="sr-only">Loading</span>
                                        </div>
                                        <h3 class="sending">Encoding</h3>
                                    </div>
                                    <div class="done">
                                        <i class="icon bigger icon-check"></i>
                                        <h3>Your Image Is Encoded Successfully !</h3>
                                        						<div class="row">
                                        	 <?php if(isset($_SESSION['aid'])){
                                            $sess=$_SESSION['aid']; ?>
                                           <a onclick="hidedown()" href="#" id="down" class="btn mx-auto primary-button">
                                            <i class="icon-cloud-download"></i>
                                            Download
                                        </a>
                                        <?php }else{
                                            $sess=0;
                                         ?>
                                        	<a onclick="hidedown()" href="#" id="down" class="btn mx-auto primary-button">
                                            <i class="icon-cloud-download"></i>
                                            Download
                                        </a>
                                        <?php } ?>
                                        

                                        <a href="#" data-toggle="modal" data-target="#sign" id="down" class="btn mx-auto secondary-button">
                                            <i class="icon-cloud-download"></i>
                                            Save to Cloud
                                        </a>
                                        </div><br>
                                     
                                        <a  href="index.php" class="btn mx-auto dark-button"><i class="icon-home"></i> Home</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Steps Message -->
                            <div class="row intro">
                                <div class="col-12 p-0">

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Hide<i style="color: #5900ff;">ON</i></h2>
                                        <p>Hide your message in any image and can be combined with encryption as an extra step for hiding or protecting data.</p>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Enter Password</h2>
                                        <p>Note : If you don't want password, please leave the password field empty.</p>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Here You Go !</h2>
                                        <p>Enter your Message that is needed to be Hidden !</p>
                                    </div>

                                </div>
                            </div>

                            <!-- Steps Group -->
                            <div class="row text-center">
                                <div class="col-12 p-0">
                                    <ul class="progressbar">
                                        <li>Upload Your File</li>
                                        <li>Password</li>
                                        <li>Hide<i style="color: #5900ff;">ON</i> Message</li>
                                    </ul>

                                    <!-- Group 1 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img id="blah" alt="Uploaded File" src="assets/images/file.png"
                                                onerror="this.onerror=null; this.src='assets/images/file.png'" ><span id="bla" style="color: #fff;"></span>

                                            </div>
                                            <div class="col-6 input-group p-0">
                                            	<?php if(isset($_SESSION['aid'])){ 
                                            		$value=100000;?>
                                            <p>The Maximum Upload size of your file is : <a href="#" id="cc"> 0 KB</a> / 100000 KB and You can also track the location,once it is <a href="#">Retrived</a>.</p>
                                            <?php }else{ 
                                            	$value=5000;?>
                                            	 <p>The Maximum Upload size of your file is : <a href="#" id="cc"> 0 KB</a> / 5000 KB and To get More Benfits <a href="#" data-toggle="modal" data-target="#sign">Login</a> here</p>
                                            <?php } ?>
                                        </div>
                                            
                                        </div>
                        <script type="text/javascript">
                        	 
                        	  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                
                reader.readAsDataURL(input.files[0]);
                //var extension.value=input.value.split('.')[1];
                var extension=input.value.split('.')[1];
                
                const fsize = input.files.item(0).size; 
                const file = Math.round((fsize / 1024));
                
                if(file><?php echo$value;?>){
                	document.getElementById("file").value="";
                	document.getElementById("cc").innerHTML="0 KB";
                	document.getElementById("bla").style.color="red";
                	document.getElementById("bla").innerHTML="Error";
                }else{
                document.getElementById("bla").innerHTML="."+extension;
                document.getElementById("cc").innerHTML=file+" KB";
                
                } 
                

            }
        }
        function show() {
        	var x=document.getElementById('pass0');
        	if(x.type === "password"){
        		x.type="text";
        	}else{
        		x.type="password";
        	}
        }
        
                        </script>
                                        <div class="row">
                                            <div class="col-12 input-group p-0">
                                            	
                                            	<input onchange="readURL(this);" id="file" type="file" class="form-control field-company" data-minlength="3" style="display:none;" required/>
                                                <a href="#" onclick="document.getElementById('file').click();" class="btn mx-auto primary-button">
                                            <i class="icon-cloud-upload"></i>
                                            Upload
                                        </a>&nbsp;<!--<a onclick="encrypt(file,pass.value)" href="#" id="down" class="btn mx-auto primary-button">
                                            <i class="icon-cloud-download"></i>
                                            Save File
                                        </a>-->
                                            </div>
                                        </div>
                                        <div class="col-12 input-group p-0">
                                            <a onclick="hideon(file)" class="step-next btn primary-button">NEXT<i class="icon-arrow-right-circle left"></i></a>
                                        </div>
                                    </fieldset>

                                    <!-- Group 2 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img id="blah2" alt="Uploaded File" src="assets/images/secure.png" >

                                            </div>
                                            <div class="col-6 input-group p-0">
                                            <p>The Password is a Secret <a href="#"> (Pass phrase)</a> must contain atleast <a href="#" >6 (Six)</a> Characters (or) Numbers</p>
                                        </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                                                 <input type="password" name="pass" id="pass0" data-minlength="0" class="form-control field-manager" placeholder="Password">
                                            </div>
                                            <div class="col-6 input-group p-0">
                                               <a onclick="show()" href="#" id="down" class="btn mx-auto primary-button">
                                            <i class="icon-eye"></i>
                                            show
                                        </a> 
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 input-group p-0 d-flex justify-content-between justify-content-md-start">
                                            <a class="step-prev btn primary-button mr-4"><i class="icon-arrow-left-circle"></i>PREV</a>
                                            <a onclick="hideoff(file)" class="step-next btn primary-button">NEXT<i class="icon-arrow-right-circle left"></i></a>
                                        </div>
                                    </fieldset>

                                    <!-- Group 3 -->
                                    <fieldset class="step-group">
                                       <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img alt="Uploaded File" src="assets/images/lock.png" id="blah2">

                                            </div>
                                            <div class="col-6 input-group p-0">
                                            <textarea id="text" name="message" data-minlength="3" class="form-control field-message" placeholder="HideON Message" required></textarea>
                                                <p id="bfdec">* Enter your Hide<a href="#"> <i>ON</i></a> message here.</p>
                                                 <p id="afdec" style="display: none;">Here is your Hide<a href="#"> <i>ON</i></a> Message !. * Click  <a href="#"><i>Finish</i></a> to Re-encode.</p>
                                        </div>
                                            
                                        </div>
                                        
                                        <div class="col-12 input-group p-0 d-flex justify-content-between justify-content-md-start">
                                            <a class="step-prev btn primary-button mr-4"><i class="icon-arrow-left-circle"></i>PREV</a>
                                            
                                            <?php if(isset($_SESSION['aid'])){
                                            $sess=$_SESSION['aid']; ?>
                                            <a  onclick="hideText()" class="step-next btn primary-button">FINISH<i class="icon-arrow-right-circle left"></i></a>
                                        <?php }else{ ?>
                                        	<a onclick="hideText()" class="step-next btn primary-button">FINISH<i class="icon-arrow-right-circle left"></i></a>
                                        <?php } ?>
                                       
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="content-images col-12 col-md-6 pl-md-5 d-none d-md-block">
                        	<style type="text/css">
                        		.sap{
                        			width: 522px;
                        			 height: 575px; 
                        			 object-fit: cover;
                        			 border-radius: 10px;

                        		}
                        	</style>
                            <!-- Step 1 -->
							<div class="galery">
                               
                                    <img id="image2" class="sap" src="assets/images/fileadd.jpg"  alt="Fit Image">
                               
                            </div>
                            

                            <!-- Step 2 -->
							

                        </div>
                    </div>
                </form>
            </div>
        </section>
        

  
 <script src="assets/js/steganography.min.js"></script>
 <script type="text/javascript">
 var imgdatauri;
 var deco=0;
 var filename;
function hideon(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var file = input.files[0];
     var sess=<?php echo$sess;?>;
     var trackid= ""+sess+Math.floor(Math.random() * 10000);
     var fname=file.name;
     var track=fname.split('-')[0];
     
     if (track==fname) {
        filename=trackid+"-"+file.name;
     }else{
        filename=fname;
     }
    
    reader.onload = function(e) {
      document.querySelector("#blah").src = e.target.result;
      imgdatauri = e.target.result;
    };
  }
  reader.readAsDataURL(input.files[0]);
}


function hideoff(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        var pass=document.querySelector('#pass0').value;
      reader.onload = function(e) {
        console.log(steg.decode(e.target.result));
        var decoded = steg.decode(e.target.result);
        var transithmac = decoded.substring(0, 64);
        var transitencrypted = decoded.substring(64);
        var decryptedhmac = CryptoJS.HmacSHA256(transitencrypted, CryptoJS.SHA256(pass)).toString();
        var decrypted = CryptoJS.DES.decrypt(transitencrypted, pass).toString(CryptoJS.enc.Utf8);
        if(transithmac == decryptedhmac){
            document.getElementById('text').value = decrypted;
        document.getElementById('bfdec').style.display='none';
        document.getElementById('afdec').style.display='block';
        delocate(filename,'hideon');
        document.querySelector("#image2").src=imgdatauri;
         document.querySelector("#down").href=imgdatauri;
        deco=1;
        }else{
        document.getElementById('fini').style.display='block';    
        }
        
      };
    }
    reader.readAsDataURL(input.files[0]);
  }


function hideText() {
    if(deco==0){
        
        var mess=document.querySelector('#text').value;
    var pass=document.querySelector('#pass0').value;
     var encrypted = CryptoJS.DES.encrypt(mess, pass).toString();
                var hmac = CryptoJS.HmacSHA256(encrypted, CryptoJS.SHA256(pass)).toString();
                var transitmessage = hmac + encrypted;
  document.querySelector("#image2").src = steg.encode(transitmessage, imgdatauri);
  locate(filename,<?php echo$sess;?>,'hideon');
}else{
        document.getElementById('fini').style.display='none';   
}
    
}

function hidedown(){
    var url=document.getElementById('image2').src;
     var a = document.createElement("a");
        a.href = url;
        a.download = filename;
        a.click();
        window.URL.revokeObjectURL(url);
}

 </script>
<?php include 'inc/footer.php';  ?>