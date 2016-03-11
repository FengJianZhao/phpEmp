<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>欢迎登录</title>
	</head>
	<body>
		
			<h1>管理员登录</h1>
			
			<form action="loginProcess.php" method="post">
				<table border="0">
					<tr><td>用户名：</td><td><input type="text" name="name" /></td></tr>
					<tr><td>密    码：</td><td><input type="password" name="password" /></td></tr>
				
				<tr><td><input type="submit" value="登录"/></td></tr>
				<tr><td><input type="reset" value="重置"/></td></tr>
			</table>
			</form>
			<?php
			//该版本完成了分层模式的分页功能，并且把分页的信息封装到FenyePage中
				if(empty($_GET['error']));
				else{
					echo "<font color='red'>您的用户名或密码错误</font>";
				}
			?>
			
					
	</body>
</html>