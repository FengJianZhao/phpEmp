<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>欢迎登录</title>
	</head>
	<body>
		<?php	

	require_once 'EmpService.class.php';
	//该页面要显示准备修改的用户的信息
	
	$id=$_GET['id'];
	
	//通过id可以查询用户的所有信息
	
	$empService = new EmpService();
	$arr = $empService->getEmpById($id);
	
	//显示
?>
			<h1>修改雇员</h1>
			<hr />
			<form action="empProcess.php" method="post">
				<table border="0">
					<tr><td>I D</td><td><input readonly="readonly" type="text" name="id" value="<?php echo $arr[0]['id'] ; ?>" /></td></tr>
					<tr><td>名字</td><td><input type="text" name="name" value="<?php echo $arr[0]['name'] ; ?>" /></td></tr>
					<tr><td>级别</td><td><input type="text" name="grade" value="<?php echo $arr[0]['grade'] ; ?>" /></td></tr>
					<tr><td>邮箱</td><td><input type="text" name="email" value="<?php echo $arr[0]['email'] ; ?>" /></td></tr>
					<tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $arr[0]['salary'] ; ?>" /></td></tr>
					<tr><td><input type="hidden" name="flag" value="updateemp" /></td></tr>
				<tr><td><input type="submit" value="修改用户"/></td>
					<td><input type="reset" value="重新填写"/></td>
				</tr>
			</table>
			</form>

	</body>
</html>