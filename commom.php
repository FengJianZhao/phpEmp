<?php	

	function getLastLogin(){
		
		if(!empty($_COOKIE['lastVisitTime'])){
		echo "<span>你上次的登录时间是".$_COOKIE['lastVisitTime']."</span>";
		setcookie("lastVisitTime",date("Y-m-d  H-i-s"));
		}
		else{
		echo "<span>欢迎你，你是第一次登录！</span>";
		setcookie("lastVisitTime",date("Y-m-d  H-i-s"));
		}
	}
	
	
	function getCookieVal($key){
		
		if(empty($_COOKIE[$key])){
			return "";
		}
		else{
			return $_COOKIE[$key];
		}
	}
	
	function checkUserValidate(){
		session_start();
		if(empty($_SESSION['loginUser'])){
			header("Location:login.php");
			exit();
		}
	}



?>