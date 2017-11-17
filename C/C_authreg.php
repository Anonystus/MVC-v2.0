<?php
session_start();
class authreg{
	
	public function login(){
		 if(!$_SESSION['auth'] and empty($_COOKIE['cookie'])){
			 include_once('M/M_login.php');
			 include_once('auth_reg/auth.php');
			 include_once('actionforms/login.html');
		 }
		 if(!$_SESSION['auth'] and !empty($_COOKIE['cookie'])){
			include_once('M/M_login.php');
			include_once('auth_reg/auth.php');
		 }
	}
	
	public function regis(){
		if($_SESSION['auth']){
			include_once('M/M_regis.php');
			include_once('auth_reg/reg.php');
			include_once('actionforms/regis.html');
		}
	}
}
?>