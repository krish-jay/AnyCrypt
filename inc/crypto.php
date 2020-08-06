<?php
 

function encryptt($text) 
{ 
	$key="@kjay";
    $iv = mcrypt_create_iv(
    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
    MCRYPT_DEV_URANDOM
);
    $data= base64_encode(
    $iv .
    mcrypt_encrypt(
        MCRYPT_RIJNDAEL_128,
        hash('sha256', $key, true),
        $text,
        MCRYPT_MODE_CBC,
        $iv
    )
);
    $data = str_replace(array('+','/'),array('-','_'),$data);
    return $data;
} 

function decryptt($text) 
{ 
	$key="@kjay";
    $text = str_replace(array('-','_'),array('+','/'),$text);
	$data = base64_decode($text);
$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

    return rtrim(
    mcrypt_decrypt(
        MCRYPT_RIJNDAEL_128,
        hash('sha256', $key, true),
        substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
        MCRYPT_MODE_CBC,
        $iv
    ),
    "\0"
);
} 


   //echo $_GET['s'];
    //$de=decryptt($_GET['s']);
    //echo$de;
   
?>

