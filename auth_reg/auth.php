<?php 

if(!empty($_POST['submitauth'] and !empty($login=$_POST['loginauth']) and !empty($pass=$_POST['passwordauth']))){
$login=$_POST['loginauth'];
$pass=$_POST['passwordauth'];
$cookie=$_POST['cookie'];
$obj=new M_login();
$obj->login($login,$pass,$cookie);
}else{echo "empty life";}
if(!$_SESSION['auth'] and !empty($_COOKIE['cookie'])){
	 $log=$_COOKIE['login'];
	 $cok=$_COOKIE['cookie'];
	 $obj=new M_login();
	 $obj->logincookie($log,$cok);
}
?>