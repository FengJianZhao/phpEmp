<?php		
	
	require_once 'SqlTool.class.php';
	//一个函数可以获取共有多少页
	class EmpService{
		function getPageCount($pageSize){
				$sql = "select count(id) from emp";
				$sqlTool = new SqlTool();
				
				$res=$sqlTool->execute_dql($sql);
				
				//计算$pageCount
				if($row = mysql_fetch_row($res)){
					$pageCount = ceil($row[0]/$pageSize);
				}
				
				//释放资源，关闭连接
				mysql_free_result($res);
				$sqlTool->close_connect();
				
				return $pageCount;
				
			}
		
		
		
		function getEmpListBypage($pageNow,$pageSize){
			$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
			$sqlTool = new SqlTool();
			$res=$sqlTool->execute_dql2($sql);
			//关闭连接
			$sqlTool->close_connect();
			return $res;
		}
		
		//第二中使用封装的方式完成分页
		function getFenyePage($fenyePage){
			//创建一个对象实例
			$sqlTool = new SqlTool();
			
			$sql1 = "select * from emp limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
			$sql2 = "select count(id) from emp";
			$sqlTool->execute_dql_fenye($sql1, $sql2, $fenyePage);
			
			$sqlTool->close_connect();
		}
	}
?>