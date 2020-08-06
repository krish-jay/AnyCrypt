
<?php
// make sure it doesn't exist

	


?>
 <script src="steganography.min.js"></script>
 <script src="assets/js/crypto-js.js"></script>
           <script src="assets/js/Blob.js"></script>
           <script src="assets/js/kjay.js"></script>
<script type="text/javascript">
	/*var message = "Message";
var passphrase = "Secret Passphrase";
var encrypted = CryptoJS.DES.encrypt(message, passphrase).toString();
var hmac = CryptoJS.HmacSHA256(encrypted, CryptoJS.SHA256(passphrase)).toString();
var transitmessage = hmac + encrypted;

//other side
passphrase = "Secret Passphrase";
var transithmac = transitmessage.substring(0, 64);
var transitencrypted = transitmessage.substring(64);
var decryptedhmac = CryptoJS.HmacSHA256(transitencrypted, CryptoJS.SHA256(passphrase)).toString();
alert(transithmac == decryptedhmac);
var decrypted = CryptoJS.DES.decrypt(transitencrypted, passphrase).toString(CryptoJS.enc.Utf8);
alert(decrypted);*/

</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Steganography</title>
    
    
    <script src="steganography.min.js"></script>
  </head>
  <body>
    <div class="cont">
      


        <div class="">
                  <input
          class="ui primary button"
          type="file"
          name="pic"
          accept="image/*"
          onchange="hide(this);"
        />
        <div class="ui input">
          <input id="text" type="text" />
        </div>
        <div class="ui input">
          <input id="pass1" placeholder="password" type="text" />
        </div>

        <button class="ui secondary button" onclick="hideText()">
          Hide Message Into Image
        </button>

        </div>
        <div class="img-cont">
          <div  class="img1">
            <h5>Source Image</h5>

            <img id="image1" src="" alt="" />
          </div>


          <div class="">
            <h5>Message Encoded Image</h5>
            <img id="image2" src="" alt="" />

          </div>

        </div>

        
    <div class="">

      <input class="ui secondary button" type="file" id="pid" name="pic" accept="image/*" onchange="" />
       <div class="ui input">
          <input id="pass0" placeholder="password" type="text" />
        </div>
         <button class="ui secondary button" onclick="decode(pid);">
          Hide Message Into Image
        </button>
      
      <h5>Decoded Text:</h5>
      <h2 id="decoded"></h2>

    </div>





      
    </div>



   
  </body>
</html>
<script type="text/javascript">
	var imgdatauri;

function hide(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.querySelector("#image1").src = e.target.result;
      imgdatauri = e.target.result;
    };
  }
  reader.readAsDataURL(input.files[0]);
}


function decode(input) {
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
        document.querySelector('#decoded').innerText = decrypted;
      };
    }
    reader.readAsDataURL(input.files[0]);
  }


function hideText() {
	var mess=document.querySelector('#text').value;
	var pass=document.querySelector('#pass1').value;
	 var encrypted = CryptoJS.DES.encrypt(mess, pass).toString();
                var hmac = CryptoJS.HmacSHA256(encrypted, CryptoJS.SHA256(pass)).toString();
                var transitmessage = hmac + encrypted;
  document.querySelector("#image2").src = steg.encode(transitmessage, imgdatauri);
}

</script>