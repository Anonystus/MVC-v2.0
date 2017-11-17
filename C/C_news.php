<?php 
class news{
	public function index(){
		include_once('V/V_index.php');
	}
	
	public function listing(){
		include_once('M/M_listing.php');
        $obj=new listing();
		$answer=$obj->listing();
		if(!empty($answer)){
			include_once('V/V_listing.php');
		}
		
	}
	
	public function listid($param){
		include_once('M/M_listing.php');
		$id=$param;
		$obj=new listing();
		$answer=$obj->listingbyid($id);
        if(!empty($answer)){
			include_once('V/V_listingbyid.php');
		}else{echo "No article!";}
	}
	
	public function change($id){
		include_once('M/M_change.php');
		if(!$id){
		$URI=trim(parse_url($_SERVER['REQUEST_URI'],5));
		$URI=explode('/',$URI);	
		$id=$URI[3];
		}
		$obj=new Mchange();
		$ans = $obj->changeshow($id);
        foreach($ans as $k){
			$title=$k['title'];
			$content=$k['content'];
		}
		if($ans){
			include_once('actionforms/change.html');
		}else{echo "Noup";}
		if(isset($_POST['submit'])){
			$title=$_POST['title'];
			$content=$_POST['content'];
		    $sql='UPDATE newss SET title="'.$title.'",content="'.$content.'" WHERE id="'.$id.'"';
			$obj=new Mchange();
			$obj->change($sql);
            echo "<-Article succesive changed here's link";
		}
		
		
	}
	
}
?>