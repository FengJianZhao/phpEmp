<?php	
	require_once 'commom.php';
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>欢迎登录</title>
	</head>
	<body>
			
			<h1>管理员登录</h1>
			<hr />
			<form action="loginProcess.php" method="post">
				<table border="0">
					<tr><td>用户名：</td><td><input type="text" name="name" value="<?php echo getCookieVal("name"); ?>"/></td></tr>
					<tr><td>密    码：</td><td><input type="password" name="password" /></td></tr>
					<tr><td colspan="2">是否保存用户名<input type="checkbox" value="yes" name="keepName" /></td></tr>
					<tr><td>验证码：</td><td><input type="text" name="checkCode" /></td><td colspan="2"><img  title="点击刷新" src="captcha.php" align="absbottom" onclick="this.src='captcha.php?'+Math.random();"></img></td></tr>
				<tr><td><input type="submit" value="登录"/></td>
				<td><input type="reset" value="重置"/></td></tr>
			</table>
			</form>
			<?php
				if(!empty($_GET['error']))
				{
					$error =$_GET['error'];
					if($error==1){
						echo "<font color='red'>您的用户名或密码错误</font>";
					}
				
				else{
						echo "<font color='red'>您的验证码输入错误</font>";
				}
				}
			?>
			
					
	</body>
</html>