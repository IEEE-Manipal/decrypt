<?php 
    require_once("config.php");
?>
<?php

	$name=mysqli_real_escape_string($connection,$_POST["username"]);
	$reg=mysqli_real_escape_string($connection,$_POST["regno"]);
	$mail=mysqli_real_escape_string($connection,$_POST["email"]);
	$pass=mysqli_real_escape_string($connection,$_POST["password"]);
	$num=mysqli_real_escape_string($connection,$_POST["num"]);
	$uid_query="SELECT UID FROM login WHERE UID='$reg'";
	$uid_result=mysqli_query($connection,$uid_query);
	$uid_row=mysqli_fetch_assoc($uid_result);
	$uid_count=mysqli_num_rows($uid_result);
?>
<?php
	if(!isset($name) || $name=="")
		header("Location: register.php?err=2");
	else if(!isset($reg) || $reg=="")
		header("Location: register.php?err=4");
	else if(!isset($num) || $num=="")
		header("Location: register.php?err=7");
	else if(!isset($mail) || $mail=="")
		header("Location: register.php?err=5");
	else if(!isset($pass) || $pass=="")
		header("Location: register.php?err=6");
	else if($uid_count)
		header("Location: register.php?err=1");
	else if(strlen($reg)!=9)
		header("Location: register.php?err=3");
	else if(strlen($num)!=10)
		header("Location: register.php?err=8");
	else if(strlen($pass)<6)
		header("Location: register.php?err=9");
	else if(!check_captcha())
	{
		header("Location: register.php?err=11");
	}	

	else{
		
		$query="INSERT INTO login(name, email_id, UID, PASS, num) VALUES('{$name}','{$mail}','{$reg}','{$pass}','{$num}')";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			header("Location: login.php?success=1");
		}
	}
function check_captcha()
{


	$response = $_POST["g-recaptcha-response"];
	if(strlen($_POST["g-recaptcha-response"])==0)
	{
		return false;
	}
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6Le82m4UAAAAAEpnV_2p2YFw82IgzetJJCvo9pFl',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);
	if ($captcha_success->success==false) {
		return false;
	} else if ($captcha_success->success==true) {
		return true;
	}


}
?>