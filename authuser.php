<?php

$ses = [];

session_start();

$ses = $_SESSION;
$uv = false;

if(count($ses) > 0){

	$ru = mysqli_query($conection,"select * from users where idUsuario = ".$ses['idUsuario']);

	if(mysqli_num_rows($ru) == 0){

		$_SESSION = array();
		session_destroy();
		setcookie(session_name(),"",time()-3600,"","");
		session_write_close();

	}else{

		$ip = sha1($_SERVER['REMOTE_ADDR']);

		if($ses['ip'] != $ip){

			$_SESSION = array();
			session_destroy();
			setcookie(session_name(),"",time()-3600,"","");
			session_write_close();

		}else{

			$fu = mysqli_fetch_assoc($ru);

			$uv = true;

		}

	}

}