<?php	

	require_once 'SqlTool.class.php';
	require_once 'AdminService.class.php';
	$name = $_POST['name'];
	
	$password= $_POST['password'];
	
	$adminService = new AdminService();
	$res=$adminService->checkAdmin($name, $password);
		if($res)
		{
			header("Location:empManage.php?name=$name");
			exit();
		}
		else{
			header("Location:login.php?error=1");
			exit();
		}
		
	mysql_free_result($res);
	

?>