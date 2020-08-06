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
                                        <h3 class="sending">Decrypting</h3>
                                    </div>
                                    <div class="done">
                                        <i class="icon bigger icon-check"></i>
                                        <h3>Your File Is Decrypted Successfully !</h3>	
                                        <p> Your Download will start automatically..</p>					<div class="row">
                                        <a onclick="decrypt(file,pass0.value,enc.value)" href="#" id="down" class="btn mx-auto primary-button">
                                            <i class="icon-cloud-download"></i>
                                            Download
                                        </a><a href="#" data-toggle="modal" data-target="#sign" id="down" class="btn mx-auto secondary-button">
                                            <i class="icon-cloud-download"></i>
                                            Save to Cloud
                                        </a>
                                        </div><br>
                                        <a href="index" class="btn mx-auto dark-button"><i class="icon-home"></i> Home</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Steps Message -->
                            <div class="row intro">
                                <div class="col-12 p-0">

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Decrypt Your File</h2>
                                        <p>Upload your encrypted file here to decrypt it.</p>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Enter Password</h2>
                                        <p>Enter the valid Pass pharse to Decrypt this file !</p>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="step-title">
                                        <h2 class="featured alt">Here You Go !</h2>
                                        <p>The Decryption Algorithm is automatically selected</p>
                                    </div>

                                </div>
                            </div>

                            <!-- Steps Group -->
                            <div class="row text-center">
                                <div class="col-12 p-0">
                                    <ul class="progressbar">
                                        <li>Upload Your File</li>
                                        <li>Password</li>
                                        <li>Decryption</li>
                                    </ul>

                                    <!-- Group 1 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img id="blah" alt="Uploaded File" src="assets/images/key.png"
                                                onerror="this.onerror=null; this.src='assets/images/key.png'" style="max-width: 40%; object-fit: cover;"><span id="bla" style="color: #fff;"></span>

                                            </div>
                                            <div class="col-6 input-group p-0">
                                           <?php if(isset($_SESSION['aid'])){ 
                                                    $value=100000;?>
                                            <p>The Maximum Upload size of your file is : <a href="#" id="cc"> 0 KB</a> / 100000 KB and You can also track the location,once it is <a href="decrypt">Decrypted</a>.</p>
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
                var extension1=input.value.split('.')[2];
                //console.log(extension1==null);
                const fsize = input.files.item(0).size; 
                const file = Math.round((fsize / 1024));
                
                if(file><?php echo$value;?> || extension1==null){
                	document.getElementById("file").value="";
                    document.getElementById("blah").src="";
                	document.getElementById("cc").innerHTML="0 KB";
                	document.getElementById("bla").style.color="red";
                	document.getElementById("bla").innerHTML="Error";
                }else{
                    document.getElementById("bla").style.color="#fff";
                document.getElementById("bla").innerHTML="."+extension;
                document.getElementById("cc").innerHTML=file+" KB";
                document.getElementById('enc').value=extension1;
                
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
                                            <a class="step-next btn primary-button">NEXT<i class="icon-arrow-right-circle left"></i></a>
                                        </div>
                                    </fieldset>

                                    <!-- Group 2 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img alt="Uploaded File" src="assets/images/secure.png" id="blah2">
                            <span id="mess"></span>
                                            </div>
                                            <div class="col-6 input-group p-0">
                                            <p>The Password is a Secret <a href="#"> (Pass phrase)</a> must contain atleast <a href="#" >6 (Six)</a> Characters (or) Numbers</p>
                                        </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                                                <input type="password" name="pass" id="pass0" data-minlength="6"  class="form-control field-manager" placeholder="Password">
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
                                            <a id="cha" onclick="check(file,pass0.value,enc.value)" class="step-next btn primary-button">NEXT<i class="icon-arrow-right-circle left"></i></a>
                                            
                                        </div>
                                    </fieldset>

                                    <!-- Group 3 -->
                                    <fieldset class="step-group">
                                        <div class="row">
                                            <div class="col-6 input-group p-0">
                            <img alt="Uploaded File" src="assets/images/open.png" id="blah2">

                                            </div>
                                            <div class="col-6 input-group p-0">
                                           <i class="icon-arrow-down"></i>
                                                <select id="enc" name="enc" data-minlength="1" class="form-control field-budget" readonly>
                                                    <option value="" selected disabled> Choose any Algorithm</option>
                                                    <option value="qbz">AES</option>
                                                    <option value="akm">DES</option>
                                                    <option value="uzi">Triple DES</option>
                                                    
                                                </select>
                                        </div>
                                            
                                        </div>
                                     
                                        
                                        <div class="col-12 input-group p-0 d-flex justify-content-between justify-content-md-start">
                                            <a class="step-prev btn primary-button mr-4"><i class="icon-arrow-left-circle"></i>PREV</a>
                                            <a onclick="decrypt(file,pass0.value,enc.value)" class="step-next btn primary-button">FINISH<i class="icon-arrow-right-circle left"></i></a>
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
                            <div class="gallry">
                               
                                    <img class="sap" src="assets/images/enc1.jpg"  alt="Fit Image">
                               
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </section>
        

  

<?php include 'inc/footer.php';  ?>