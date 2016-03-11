<?php	
	
	class Admin{
	
	private $id;
	private $name;
	private $password;
	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		 $this->id=$id;
	}
	
	public function getName(){
		return $this->id;
	}
	
	public function seName($name){
		$this->name=$name;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function seName($password){
		$this->name=$password;
	}
}
?>