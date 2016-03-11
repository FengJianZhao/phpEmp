<?php	

	//该类是一个业务逻辑处理类，主要完成对admin表的操作
	require_once 'SqlTool.class.php';
	class AdminService{
		//提供一个验证用户是否合法的方法
		public function checkAdmin($name,$password){
			
			$sql = "select password from admin where name='".$name."'";
			
			$sqlHelper = new SqlTool();
			
			$res=$sqlHelper->execute_dql($sql);
			if($row=mysql_fetch_assoc($res)){
				if(md5($password)==$row['password'])
				{
					return $name;
				}	
			}

			//释放资源
			mysql_free_result($res);
			//关闭连接
			$sqlHelper->close_connect();
			return false;	
			
		}
	}



?>