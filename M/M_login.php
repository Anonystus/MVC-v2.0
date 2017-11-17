<?php 
include_once('M/Model.php');
class M_login extends Model{
	
	public function login($log,$pass,$cookie){
	$db='users';
	$sql='SELECT * FROM users WHERE login="'.$log.'"';
	$answer=M_login::Connection($db,$sql);
	$salt=$answer['salt'];
	$passdb=$answer['password'];
	$saltpass=md5($pass.$salt);
	$login=$answer['login'];
	if($saltpass==$passdb){
		session_start();
		$_SESSION['auth']=true;
	}
	if($cookie){
		function salt(){
			$salt='';
			$saltlenght=8;
			for($i=0;$i<$saltlenght;$i++){
				$salt.=chr(mt_rand(33,126));
			}return $salt;
		}
		$salt=salt();
		setcookie('login',$login,time()+60*60*24*30);
		setcookie('cookie',$salt,time()+60*60*24*30);
		$cookie=$_COOKIE['cookie'];
		$sql='UPDATE users SET cookie="'.$cookie.'" WHERE login="'.$login.'"';
		M_login::ConnectionQuery($db,$sql);
		echo $cookie;
		
	}
	
	
	
	
	
	
}
	
	
	public function logincookie($login,$cookie){
	echo $login;
	echo"<br>";
	echo $cookie;
	echo"<br>";
	$sql='SELECT * FROM users WHERE login = "'.$login.'" AND cookie="'.$cookie.'"';
	$db='users';
	$answer=M_login::Connection($db,$sql);
		if($answer){
		echo"true";	
		echo $answer['login'];
		$_SESSION['auth']=true;
		}else{echo "<br>";echo " bad cookie";}
		
		
		
	}
	
	}
?>