<?php
	
	//该类封装需要分页的各种信息
	
	class FenyePage{
		public $pageSize=10;
		public $res_array; //这是显示数据
		public $rowCount;	//从数据库中获取
		public $pageNow;	//用户指定的
		public $pageCount;  //计算得来
		public $navigate;  //分页导航
	}
			
	
	
?>