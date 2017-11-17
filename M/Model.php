<?php 
class Model{
	
	public static function DB($database,$sql){ 
		
		$host='localhost';
		$user='root';
		$pass='';
		$DB=$database;
		$SQL=$sql;
		$connect=mysqli_connect($host,$user,$pass,$DB)or die(mysqli_error('Incorrect connection'));
		$query=mysqli_query($connect,$SQL)or die('Wrong sql-query');
		if($query){
		$ans=[];
		while($answer=mysqli_fetch_assoc($query)){
			$ans[]=$answer;
		}return $ans;
		
	}	
}
     public static function Connection($database,$sql){   
		$host='localhost';
		$user='root';
		$pass='';
		$DB=$database;
		$SQL=$sql;
		$connect=mysqli_connect($host,$user,$pass,$DB)or die(mysqli_error('Incorrect connection'));
		$query=mysqli_query($connect,$SQL)or die('Wrong sql-query');
		$query=mysqli_fetch_assoc($query);
		if($query){
			return $query;
		}else{echo "NOOP!";}
	}
	
	public static function ConnectionQuery($database,$sql){   
		$host='localhost';
		$user='root';
		$pass='';
		$DB=$database;
		$SQL=$sql;
		$connect=mysqli_connect($host,$user,$pass,$DB)or die(mysqli_error('Incorrect connection'));
		$query=mysqli_query($connect,$SQL)or die('Wrong sql-query');
		if($query){
			return $query;
		}else{echo "Query wasn't succesive";}
	}

	
}
?>