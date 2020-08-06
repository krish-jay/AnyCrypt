
function encrypt(input,key,enc) {
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
         if(enc=="qbz"){
             var filename = file.name + ".qbz";
        }else if(enc=="akm"){
             var filename = file.name + ".akm";
        }else if(enc=="uzi"){
             var filename = file.name + ".uzi";
        }
        
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

function check(input,key,enc) {
    document.getElementById("mess").style.color="#fff";
    document.getElementById("mess").innerHTML="Verifying...";
    var file = input.files[0];
    var reader = new FileReader();
    var k=key;
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
              if(transithmac == decryptedhmac){
                document.getElementById("mess").style.color="#06d755";
                    document.getElementById("mess").innerHTML="Correct Password";
                    var filename = file.name.substr(0, file.name.length - 4) ;
                    delocate(filename,enc);
                    document.getElementById("cha").innerHTML="NEXT";

              }else{
                
                document.getElementById("mess").style.color="red";
                    document.getElementById("mess").innerHTML="Invalid Password";
                    document.getElementById("pass").maxlength="3";
              }
                   };
                   reader.readAsText(file);
}



function decrypt(input,key,enc) {
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
        //delocate(filename,enc);
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

 
           