<?php include 'inc/header.php'; 





?>


   <!-- Contact -->
        <section id="contact" class="section-8 odd form">
            <div class="container">

                <form enctype="multipart/form-data" method="post" action="secureshare" class="multi-step-form">
                    

                    <div class="row">

                        <div class="col-12 col-md-6 align-self-start text-center text-md-left">

                            <!-- Success Message -->
                            <div class="row success message">
                                <div class="col-12 p-0">
                                    <div class="wait">
                                        <div class="spinner-grow" role="status">
                                            <span class="sr-only">Loading</span>
                                        </div>
                                        <h3 class="sending">Generating</h3>
                                    </div>
                                    <div class="done">
                                        <i class="icon bigger icon-check"></i>
                                        <h3>Your link Is Generated Successfully !</h3>						<div class="row">
                                        <a href="#" id="down" class="btn mx-auto primary-button">
                                            <i class="icon-share"></i>
                                            Copy
                                        </a><a href="#" data-toggle="modal" data-target="#sign" id="down" class="btn mx-auto secondary-button">
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
                                        <h2 class="featured alt">Securely Share Files</h2>
                                        <p>This is the Feature allows you to share file that automatically expires after specified view count or specified time.</p>
                                         <?php if(isset($_GET['share']) && $_GET['share']=="false"){ ?>
                            <div class="col-12 text-center">
                                <span class="form-alert mt-5 mb-0"> <b>Sorry !</b> We Don't Support	the File Format Uploaded, Please try Other Formats (if its zip , batch and other suspisious stuffs)</span>
                            </div>
                        <?php } ?>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Enter Password</h2>
                                        <p>After entering the password and Specify your file's expiration time and Number of views</p>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Here You Go !</h2>
                                        <p>Copy Your Shareable link here and send to the person !</p>
                                    </div>

                                </div>
                            </div>

                            <!-- Steps Group -->
                            <div class="row text-center">
                                <div class="col-12 p-0">
                                    <ul class="progressbar">
                                        <li>Upload Your File</li>
                                        <li>Password</li>
                                        <li>Secure Share</li>
                                    </ul>

                                    <!-- Group 1 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img id="blah" alt="Uploaded File" src="assets/images/file.png"
                                                onerror="this.onerror=null; this.src='assets/images/file.png'" style="max-width: 40%; object-fit: cover;"><span id="bla" style="color: #fff;"></span>

                                            </div>
                                            <div class="col-6 input-group p-0">
                                           <?php if(isset($_SESSION['aid'])){ 
                                            		$value=500000;?>
                                            <p>The Maximum Upload size of your file is : <a href="#" id="cc"> 0 KB</a> / 500000 KB and You can also track the location,once it is <a href="decrypt">Decrypted</a>.</p>
                                            <?php }else{ 
                                            	$value=100000;?>
                                            	 <p>The Maximum Upload size of your file is : <a href="#" id="cc"> 0 KB</a> / 100000 KB and To get More Benfits <a href="#" data-toggle="modal" data-target="#sign">Login</a> here</p>
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
        	var x=document.getElementById('pass');
        	if(x.type === "password"){
        		x.type="text";
        	}else{
        		x.type="password";
        	}
        }
        
                        </script>
                                        <div class="row">
                                            <div class="col-12 input-group p-0">
                                            	
                                            	<input onchange="readURL(this);" id="file" name="secure" type="file" class="form-control field-company" data-minlength="3" style="display:none;"  required/>
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
                                            <a class="step-next btn primary-button">NEXT<i class="icon-arrow-right-circle left"></i></a>
                                        </div>
                                    </fieldset>

                                    <!-- Group 2 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img alt="Uploaded File" src="assets/images/secure.png" id="blah2">

                                            </div>
                                            <div class="col-6 input-group p-0">
                                            <input type="password" name="spass" id="pass" data-minlength="6" class="form-control field-manager" placeholder="Password">
                                            <p>The Password Must Contain atleast <a href="#">6</a> Characters</p>
                                        </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                                                <input type="number" name="view" id="view" data-minlength="1" class="form-control field-manager" placeholder="No.of.Views (allowed)">
                                            </div>
                                            <div class="col-6 input-group p-0">
                                               <input type="text" onfocus="(this.type='date')" name="date" onblur="(this.type='text')" id="date" data-minlength="6" class="form-control field-manager" placeholder="Link Expiration Date">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 input-group p-0 d-flex justify-content-between justify-content-md-start">
                                            <a class="step-prev btn primary-button mr-4"><i class="icon-arrow-left-circle"></i>PREV</a>
                                            <a class="step-next btn primary-button">NEXT<i class="icon-arrow-right-circle left"></i></a>
                                        </div>
                                    </fieldset>

                                    <!-- Group 3 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img alt="Uploaded File" src="assets/images/lock.png" id="blah2">

                                            </div>
                                            <div class="col-6 input-group p-0">
                                            <textarea name="message" data-minlength="3" class="form-control field-message" placeholder="Message" required></textarea>
                                                <p>* Please leave a<a href="#"> <i> Welcome Message </i></a> for the visitors.</p>
                                        </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="col-12 input-group p-0 d-flex justify-content-between justify-content-md-start">
                                            <a class="step-prev btn primary-button mr-4"><i class="icon-arrow-left-circle"></i>PREV</a>
                                            <a class="step-next btn primary-button">FINISH<i class="icon-arrow-right-circle left"></i></a>
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
                               
                                    <img class="sap" src="assets/images/fileshare.jpg"  alt="Fit Image">
                               
                            </div>
                            

                            <!-- Step 2 -->
							

                        </div>
                    </div>
                </form>
            </div>
        </section>
        

  

<?php include 'inc/footer.php';  ?>

