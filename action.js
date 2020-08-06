 function edituser(v1,v2,v3) {   
                            var edituser=1;
                            var name = v1;
                            var email = v2;
                            var password = v3;
                            var cap=grecaptcha.getResponse();
                            var sess=document.getElementById('sess').value;
                        
                            if(v1 === "" ||v2 === "" ||v3 === ""){
                                document.getElementById('reg2').innerHTML="* Please fill all fields";
                                exit(1);
                            }
                            if(cap === ""){
                                document.getElementById('reg2').style.color="#d14";
                                document.getElementById('reg2').innerHTML="* Are you Robot dummy ?!";
                                exit(1);
                            }
                            

                            $.ajax
                                ({
      type: 'post',
      url: 'inc/action.php',
      data: 
      {
         edituser:edituser,
         cname:name,
         email:email,
         password:password,
          cap:cap,
          sess:sess,
      },
      success: function (response) 
      {
        $('#reg2').html(response);
  
      }
    });
                            }


     function login(v1,v2) {  
      if(v1 === "" ||v2 === ""){
                                document.getElementById('reg1').innerHTML="* Please fill all fields";
                                exit(1);
                            } 
                            var login=1;
                            var email = v1;
                            var password = v2;
                          // document.getElementById('signclose').click();
                            $.ajax
                                ({
      type: 'post',
      url: 'inc/action.php',
      data: 
      {
         login:login,
         email:email,
         password:password,
      },
      success: function (response) 
      {
        $('#reg1').html(response);

  
      }
    });
                            }


     function pass(a1,a2) {

                var pass1=a1;
                var pass2=a2;
                if(pass1==pass2){
                    
                }else{
                    document.getElementById('reg').innerHTML="Password doesn't match";
                    exit(1);
                }
            }
            function adduser(v1,v2,v3) {   
                            var adduser=1;
                            var name = v1;
                            var email = v2;
                            var password = v3;
                            var cap=grecaptcha.getResponse();
                        
                            var cpass=document.getElementById('password').value;
                            if(v1 === "" ||v2 === "" ||v3 === "" || cpass===""){
                                document.getElementById('reg').innerHTML="* Please fill all fields";
                                exit(1);
                            }
                            if(cap === ""){
                                document.getElementById('reg').style.color="#d14";
                                document.getElementById('reg').innerHTML="* Are you Robot dummy ?!";
                                exit(1);
                            }
                            pass(password,cpass);

                            $.ajax
                                ({
      type: 'post',
      url: 'inc/action.php',
      data: 
      {
         adduser:adduser,
         cname:name,
         email:email,
         password:password,
          cap:cap,
      },
      success: function (response) 
      {
        $('#reg').html(response);
  
      }
    });
                            }

    function locate(input,sess,enc) {
      
       var filename = input;
       var trackid=filename.split('-')[0];
       var getlocation =1;
       var sess=sess;
       var enc=enc;
       $.ajax
                                ({
      type: 'post',
      url: 'inc/action.php',
      data: 
      {
         filename:filename,
         getlocation:getlocation,
         sess:sess,
         enc:enc,
         trackid:trackid,
      },
      success: function (response) 
      {
        $('#regos').html(response);
  
      }
    });
    }
 



function encrypt(input,key,enc,sess) {
    var file = input.files[0];
    var reader = new FileReader();
     var key = key+"@kjay";
     var enc=enc;
    reader.onload = () => {
       
        
        var wordArray = CryptoJS.lib.WordArray.create(reader.result);           // Convert: ArrayBuffer -> WordArray

        if(enc=="qbz"){
            var encrypted = CryptoJS.AES.encrypt(wordArray, key).toString();        // Encryption: I: WordArray -> O: -> Base64 encoded string (OpenSSL-format)
        }else if(enc=="akm"){
            var encrypted = CryptoJS.DES.encrypt(wordArray, key).toString();        // Encryption: I: WordArray -> O: -> Base64 encoded string (OpenSSL-format)
        }else if(enc=="uzi"){
            var encrypted = CryptoJS.TripleDES.encrypt(wordArray, key).toString();        // Encryption: I: WordArray -> O: -> Base64 encoded string (OpenSSL-format)
        }
        //console.log(encrypted);
        var hmac = CryptoJS.HmacSHA256(encrypted, CryptoJS.SHA256(key)).toString();
        encrypted = hmac + encrypted;


        var fileEnc = new Blob([encrypted]);                                    // Create blob from string

        var a = document.createElement("a");
        var url = window.URL.createObjectURL(fileEnc);
        var trackid= ""+sess+Math.floor(Math.random() * 10000);
         if(enc=="qbz"){
             var filename = trackid+"-"+file.name+ ".qbz";
        }else if(enc=="akm"){
             var filename = trackid+"-"+file.name+ ".akm";
        }else if(enc=="uzi"){
             var filename = trackid+"-"+file.name+ ".uzi";
        }
        locate(filename,sess,enc);
        a.href = url;
        //a.class= "btn mx-auto primary-button";
        //console.log(filename);
        //document.getElementById('down').href=filename;
        a.download = filename;
        a.click();
        window.URL.revokeObjectURL(url);
    };
    reader.readAsArrayBuffer(file);

}



function decrypt(input,key,enc,sess) {
    var file = input.files[0];
    var reader = new FileReader();
    var key = key+"@kjay";
     var enc=enc;

    reader.onload = () => { 
var re=reader.result;
     //console.log(re);
     var transithmac = re.substring(0, 64);
var transitencrypted = re.substring(64);
var decryptedhmac = CryptoJS.HmacSHA256(transitencrypted, CryptoJS.SHA256(key)).toString();

            if(enc=="qbz"){
             var decrypted = CryptoJS.AES.decrypt(transitencrypted, key);
              }else if(enc=="akm"){
             var decrypted = CryptoJS.DES.decrypt(transitencrypted, key);
                }else if(enc=="uzi"){
            var decrypted = CryptoJS.TripleDES.decrypt(transitencrypted, key);
             }

          // Decryption: I: Base64 encoded string (OpenSSL-format) -> O: WordArray
                       
        var typedArray = convertWordArrayToUint8Array(decrypted);               // Convert: WordArray -> typed array

        var fileDec = new Blob([typedArray]);                                   // Create blob from typed array

        var a = document.createElement("a");
        var url = window.URL.createObjectURL(fileDec);
        var filename = file.name.substr(0, file.name.length - 4) ;
        a.href = url;
        a.download = filename;
        a.click();
        window.URL.revokeObjectURL(url);
    };
    reader.readAsText(file);
}

function convertWordArrayToUint8Array(wordArray) {
    var arrayOfWords = wordArray.hasOwnProperty("words") ? wordArray.words : [];
    var length = wordArray.hasOwnProperty("sigBytes") ? wordArray.sigBytes : arrayOfWords.length * 4;
    var uInt8Array = new Uint8Array(length), index=0, word, i;
    for (i=0; i<length; i++) {
        word = arrayOfWords[i];
        uInt8Array[index++] = word >> 24;
        uInt8Array[index++] = (word >> 16) & 0xff;
        uInt8Array[index++] = (word >> 8) & 0xff;
        uInt8Array[index++] = word & 0xff;
    }
    return uInt8Array;
}
/*
function hideone(input,pass,mess) {
  var imgdatauri;
  if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                         imgdatauri = e.target.result;
                };
                var encrypted = CryptoJS.DES.encrypt(mess, pass).toString();
                var hmac = CryptoJS.HmacSHA256(encrypted, CryptoJS.SHA256(pass)).toString();
                var transitmessage = hmac + encrypted;

                reader.readAsDataURL(input.files[0]);
                document.querySelector("#resulthide").src = steg.encode(transitmessage, imgdatauri);
              }
}
           
           function hideoff(input,pass) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        var decoded = steg.decode(e.target.result);
        var transithmac = transitmessage.substring(0, 64);
        var transitencrypted = transitmessage.substring(64);
        var decryptedhmac = CryptoJS.HmacSHA256(transitencrypted, CryptoJS.SHA256(passphrase)).toString();
        var decrypted = CryptoJS.DES.decrypt(transitencrypted, passphrase).toString(CryptoJS.enc.Utf8);
        document.getElementById('messtext').value=decrypted;
      };
    }
    reader.readAsDataURL(input.files[0]);
  }
*/