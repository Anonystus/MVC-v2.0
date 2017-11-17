<?php 
include_once('M/Model.php');
class regis extends Model{
	public function gotoreg($log,$pass){
		
	$db='users';
	$sql='SELECT * FROM users WHERE login="'.$log.'"';
	
	$ans=regis::DB($db,$sql);
	if($ans){
	echo "<br>";
    echo "login : ";	
	echo $log;
    echo "  is somebody have!";
	}else{
		function salt(){
			$salt='';
			$lenght=8;
			for($i=0;$i<$lenght;$i++){
				$salt.=chr(mt_rand(33,126));
			}return $salt;
		}
		$salt=salt();
		$passalt=md5($pass.$salt);
		$cookie=null;
		$sql=('INSERT INTO users(login,password,salt,cookie)VALUES("'.$log.'","'.$passalt.'","'.$salt.'","'.$cookie.'")');
		//$sql='INSERT INTO users login="'.$log.'" password="'.$passalt.'" salt="'.$salt.'" cookie="'.$cookie.'" status="'.$status.'"';
		
		$ans=regis::ConnectionQuery($db,$sql);
		if($ans){
			echo "Registration is succesive!";
		}
		
	}
	}
}
?>