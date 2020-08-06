<?php
session_start();
include 'db.php';
 
        function reCaptcha($recaptcha){
        $secret = "6Lclwa8ZAAAAAOUfQ2-mHJP4pwX60UUsZ2qGPrTF";
            $ip = $_SERVER['REMOTE_ADDR'];

        $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
  $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
  $data = curl_exec($ch);
  curl_close($ch);

  return json_decode($data, true);
}

if (isset($_POST['adduser'])) {
	//echo "success";
	$cname=$_POST['cname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cap=$_POST['cap'];
	$res = reCaptcha($cap);
if(!$res['success']){
  echo '<span style="color: red;" id="reg">Warning reCaptcha Error !</span>';
}else{
	$emailcheck=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
	$ecount=mysqli_num_rows($emailcheck);
	if($ecount>=1){
		echo '<span style="color: red;" id="reg">This Email Id already exists !</span>';
	}else{

	$a=mysqli_query($conn,"INSERT INTO `users`( `name`, `email`, `pass`, `level`, `verify`) VALUES ('$cname','$email','$password','0','0')");
	if($a){
		echo '<span style="color: #06d755;" id="reg"> Registered Successfully ! Please <a href="#" data-toggle="modal" data-target="#sign">login</a> to continue.<script>window.location.href="pricing";</script> </span>';
	}else{
		echo '<span style="color: red;" id="reg">Something Went Wrong !</span>';
	}
}

}
}

if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$emailcheck=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
	$ecount=mysqli_num_rows($emailcheck);
	if($ecount==0){
		echo '<span style="color: red;" id="reg">This Email Id does not exists !</span>';
	}else{
		$a=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND pass='$password'");
		$ec=mysqli_num_rows($a);
		$j=mysqli_fetch_array($a);
		if($ec==1){
			$_SESSION['aid']=$j['id'];
			echo '<span style="color: #06d755;" id="reg"> Login Successfully !</span>';
			echo "<script> logincheck(); </script>";
		}else{
			echo '<span style="color: red;" id="reg">Incorrect Email or Password!</span>';
		}
	}
}

if(isset($_POST['logincheck'])){
	if (isset($_SESSION['aid'])) {
		$id=$_SESSION['aid'];
		$a=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
		$j=mysqli_fetch_array($a);
		$name=$j['name'];
		echo '<li class="nav-item dropdown">
                            <a href="#services" class="nav-link"><i class="icon-user"></i>&nbsp; '.$name.' <i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="logout">Logout</a>
                                    
                                </li>
                               <script>location.reload();</script> 
                            </ul>
                        </li>';
	}else{
		echo'<li id="session" class="nav-item">
                            <a href="#" data-toggle="modal" data-target="#sign" class="nav-link smooth-anchor">Login</a>
                        </li>';
	}
}


if (isset($_POST['edituser'])) {
	//echo "success";
	$cname=$_POST['cname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cap=$_POST['cap'];
	$sess=$_POST['sess'];
	$res = reCaptcha($cap);
	$up=mysqli_query($conn,"SELECT * FROM users WHERE id='$_SESSION[aid]'");
    $kj=mysqli_fetch_array($up);
    $dbemail=$kj['email'];
if(!$res['success']){
  echo '<span style="color: red;" id="reg2">Warning reCaptcha Error !</span>';
}else{
	$emailcheck=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
	$ecount=mysqli_num_rows($emailcheck);
	if($ecount>=1 && $dbemail!=$email){
		echo '<span style="color: red;" id="reg2">This Email Id already exists !</span>';
	}else{

	$a=mysqli_query($conn,"UPDATE users SET name='$cname',email='$email',pass='$password' WHERE id='$sess'");
	if($a){
		echo '<span style="color: #06d755;" id="reg2"> Updated Successfully ! <script>location.reload();</script> </span>';
		echo "<script> logincheck(); </script>";
	}else{
		echo '<span style="color: red;" id="reg2">Something Went Wrong !</span>';
	}
}

}
}


	if (isset($_POST['getlocation'])) {
		$filename=$_POST['filename'];
		$sess=$_POST['sess'];
		$enc=$_POST['enc'];
		$loc=getenv("REMOTE_ADDR");
		$res=mysqli_query($conn,"SELECT * FROM track WHERE user='$sess'");
		$numa=mysqli_num_rows($res);
		//$trackid=$numa+1;
		$trackid=$_POST['trackid'];
		$r=mysqli_query($conn,"INSERT INTO `track`(`trackid`, `filename`, `type`, `user`, `uplocation`, `location`, `otime`) VALUES ('$trackid','$filename','$enc','$sess','$loc','','')");
	}

if (isset($_POST['setlocation'])) {
		$filename=$_POST['filename'];
		$sess=$_POST['sess'];
		$enc=$_POST['enc'];
		$loc=getenv("REMOTE_ADDR");
		$trackid=$_POST['trackid'];
		$res=mysqli_query($conn,"SELECT * FROM track WHERE trackid='$trackid'");
		$numa=mysqli_num_rows($res);
		$browser = $_SERVER['HTTP_USER_AGENT'];
		//$trackid=$numa+1;
		if($numa>=1){
			$r=mysqli_query($conn,"INSERT INTO `locations`( `trackid`, `location`, `user`, `browser`) VALUES ('$trackid','$loc','$sess','$browser')");
			echo "Your Location is Added";
		}else{
			echo "Error";
		}
		echo "<br>".mysqli_error($conn);
	}
 ?>