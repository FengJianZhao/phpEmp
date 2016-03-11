<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>欢迎登录</title>
	</head>
	<body>
			
			<h1>添加雇员</h1>
			<hr />
			<form action="empProcess.php" method="post">
				<table border="0">
					<tr><td>名字</td><td><input type="text" name="name" /></td></tr>
					<tr><td>级别</td><td><input type="text" name="grade" /></td></tr>
					<tr><td>邮箱</td><td><input type="text" name="email" /></td></tr>
					<tr><td>薪水</td><td><input type="text" name="salary" /></td></tr>
					<tr><td><input type="hidden" name="flag" value="addemp" /></td></tr>
				<tr><td><input type="submit" value="添加用户"/></td>
					<td><input type="reset" value="重新填写"/></td>
				</tr>
			</table>
			</form>
	</body>
</html>