<html>
	<head>
		<title>欢迎回来</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<?php	
		require_once 'commom.php';
		
		checkUserValidate();
		
		getLastLogin();
		
		
		?>
		<h1>主界面</h1>
		<a href="empList.php">管理用户</a>
		<a href="addEmp.php">添加用户</a>
		<a href="#">查询用户</a>
		<a href="login.php">退出系统</a>
		
	</body>
</html>


