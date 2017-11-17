<?php 
class Router{
	public static function ControllerAndAction(){
		spl_autoload_register(function ($class){
		include_once('C/C_'.$class.'.php');
	});
		$routes=include_once('core/routes.php');
		$URI=trim(parse_url($_SERVER['REQUEST_URI'],5));
		$URI=explode('/',$URI);
	   if(!empty($URI[1] and empty($URI[2]))){
		   foreach($routes as $k=>$v){
			   $k=explode('/',$k);
			   $v=explode('/',$v);
			   if($URI[1]===$k[0] and empty($k[1])){
				   $Controller=$v[0];
				   $Action=$v[1];
				   $obj=new $Controller();
				   if(method_exists($obj,$Action)){
					   $obj->$Action();
				   }else{echo 'ERROR 404 BITCH!';}
			   }
			   
		   }
	   }elseif(!empty($URI[1] and !empty($URI[2])) and empty($URI[3])){
		   foreach($routes as $k=>$v){
			   $k=explode('/',$k);
			   $v=explode('/',$v);
			   if($URI[1]===$k[0] and $URI[2]===$k[1] and !isset($k[2])){
				   $Controller=$v[0];
				   $Action=$v[1];
				   $obj=new $Controller();
				   if(method_exists($obj,$Action)){
					   $obj->$Action();
				   }else{echo 'ERROR 404 BITCH!';}
			   }
			   
		   }
	   }elseif(!empty($URI[1]) and !empty($URI[2]) and !empty($URI[3])){
		   foreach($routes as $k=>$v){
			   $k=explode('/',$k);
			   $v=explode('/',$v);
			   if($URI[1]===$k[0] and $URI[2]===$k[1] and isset($k[2])){
				   $Controller=$v[0];
				   $Action=$v[1];
				   $id=$URI[3];
				   $obj=new $Controller();
				   if(method_exists($obj,$Action)){
					   $obj->$Action($id);
				   }else{echo 'ERROR 404 BITCH!';}
			   }
			   
		   }
	   }
		
	}
	
	public static function start(){
		Router::ControllerAndAction();
	}
	
	
}
?>