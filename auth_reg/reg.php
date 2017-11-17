<?php 
if(isset($_POST['submit'])){
	if(!empty($_POST['login']) and !empty($_POST['password']) and $_POST['password']==$_POST['reset_password']){
		
		$login=$_POST['login'];
		$password=$_POST['password'];
		
		$obj=new regis();
		$obj->gotoreg($login,$password);
		
	}else{echo "error";}
}
?>