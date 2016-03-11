<?php	

	require_once 'SqlTool.class.php';
	require_once 'AdminService.class.php';
	$name = $_POST['name'];
	
	$password= $_POST['password'];
	
	$keepName = $_POST['keepName'];
	
	$checkCode = $_POST['checkCode'];
	
	//先查看验证码是否正确
	session_start();
	if($checkCode!=$_SESSION['checkCode']){
		header("Location:login.php?error=2");
		exit();
	}
	
	
	if(!empty($keepName)){
		setcookie("name",$name,time()+30);
	}
	
	$adminService = new AdminService();
	$res=$adminService->checkAdmin($name, $password);
		if($res)
		{
			session_start();
			$_SESSION['loginUser']=$name;
			header("Location:empManage.php?name=$name");
			exit();
		}
		else{
			header("Location:login.php?error=1");
			exit();
		}
		
	mysql_free_result($res);
	

?>