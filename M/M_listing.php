<?php 
include_once('M/Model.php');
class listing extends Model{
	public function listing(){
		$db='news';
		$sql='SELECT*FROM newss';
		$answer=listing::DB($db,$sql);
		return $answer;
	} 
	public function listingbyid($id){
		if(!$id){
		$URI=trim(parse_url($_SERVER['REQUEST_URI'],5));
		$URI=explode('/',$URI);	
			$id=$URI[3];
		}
		$db='news';
		$sql='SELECT*FROM newss WHERE id = "'.$id.'"';
		$answer=listing::DB($db,$sql);
		return $answer;
	}
}
?>