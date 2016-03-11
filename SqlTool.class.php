<meta charset="UTF-8"/>
<?php	

	require_once 'FenyePage.class.php';
	class SqlTool{
		
		private $conn;
		private $host="localhost";
		private $user="root";
		private $password="123456";
		private $db="emp";
		
		public function __construct(){
			$this->conn = mysql_connect($this->host,$this->user,$this->password);
			if(!$this->conn){
				die("连接数据库失败".mysql_error());
			}
			mysql_select_db($this->db,$this->conn);
			mysql_query("set names utf8");
		
		}
		
		//完成select
		public function execute_dql($sql){
			
			$res = mysql_query($sql) or die("操作失败".mysql_error());
			return $res;
		}
		
		public function execute_dql2($sql){
			$arr = array();
			$res = mysql_query($sql) or die("操作失败".mysql_error());
			$i=0;
			while($row=mysql_fetch_array($res))
			{
				$arr[$i++]=$row;
			}
			mysql_free_result($res);
			return $arr;
		}
		
		//考虑分页情况的查询
		public function execute_dql_fenye($sql1,$sql2,$fenyePage){
			$res = mysql_query($sql1) or die(mysql_error());
			$arr = array();
			//查询要分页的数据
			while($row=mysql_fetch_assoc($res)){
				$arr[]=$row;
			}
			
			mysql_free_result($res);
			
			$res = mysql_query($sql2) or die(mysql_error());
			if($row = mysql_fetch_row($res)){
				$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
				$fenyePage->rowCount=$row[0];
			}
			mysql_free_result($res);
			$fenyePage->res_array=$arr;
			
			//把导航信息也封装到fengyePage对象中
			$start = floor(($fenyePage->pageNow-1)/10)*10+1;
			$index =$start;
			
			
			$fenyePage->navigate="<table  id='tab' border=1 cellspacing=0><tr>";
			if($fenyePage->pageNow>10){
			$fenyePage->navigate.="<td><a href='{$fenyePage->gotoUrl}?page=".($start-1)."'><<</a></td>";
			}
			//上一页
			if($fenyePage->pageNow>1){
				$prePage = $fenyePage->pageNow-1;
				$fenyePage->navigate.="<td><a href='{$fenyePage->gotoUrl}?page=$prePage'>上一页</a></td>";
			}
			for($start=$index;$start<$index+10;$start++){
				$fenyePage->navigate.="<td><a href='{$fenyePage->gotoUrl}?page=$start'>$start</a></td> ";
			}
			
			//下一页
			if($fenyePage->pageNow<$fenyePage->pageCount){
				$nextPage=$fenyePage->pageNow+1;
				$fenyePage->navigate.="<td><a href='{$fenyePage->gotoUrl}?page=$nextPage'>下一页</a></td>";
			}
			$fenyePage->navigate.="<td><a href='{$fenyePage->gotoUrl}?page=$start'>>></a></td>";
			$fenyePage->navigate.="</tr></table>";
			//显示当前页
			$fenyePage->navigate.="当前页{$fenyePage->pageNow}/共{$fenyePage->pageCount}页<br />";
			
		}
		
		
		//完成update,delete,insert
		public function execute_dml($sql){
			
			$b=mysql_query($sql,$this->conn) or die("操作失败".mysql_error());
			if(!$b){
				return 0;//失败
			}
			else{
				if(mysql_affected_rows($this->conn)>0)
				{
					return 1;//成功
				}
				else{
					return 2;//表示没有行数影响
				}
			}
			
		}	
		public function close_connect(){
			if(!empty($this->conn)){
				mysql_close($this->conn);
			}
		}
	}
?>