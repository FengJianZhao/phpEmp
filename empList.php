<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>雇员信息列表</title>
		<style type="text/css">
			.chart{
				width: 700px;
				text-align: center;
			}
			a{
				text-decoration: none;	
			}
			#tab{
				width: 450px;
				
				
			}
			#tab tr{
				text-align: center;
				background-color: whitesmoke;
			}
			#tab tr a{
				color: black;
			}
			#tab tr a:hover{
				background: #0aa770;
				
			}
			.now{
				background: #0aa770;
				border-color:#0aa770;
			}	
		</style>
	</head>
	<body>
		<input type="hidden" name="" id="" value="" />
		<h1>雇员信息列表</h1>
		<?php	
			require_once 'EmpService.class.php';
			require_once 'FenyePage.class.php';	
			require_once 'commom.php';
			//设置session防止非法用户不登陆直接跳至该页面
			checkUserValidate();
			
			//创建一个EmpService实例
			$empService = new EmpService();
			//创建一个FenyePage实例
			$fenyePage = new FenyePage();
			
			$fenyePage->pageNow=1;
			$fenyePage->pageSize=10;
			$fenyePage->gotoUrl="empList.php";
			
			
			
			if(empty($_GET['page'])){
			$fenyePage->pageNow=1;
			}
			else{
			$fenyePage->pageNow=$_GET['page'];
			}
			
			echo "<input type='hidden' id='pagenow' value='$fenyePage->pageNow'/>";
			
			
		
			$empService->getFenyePage($fenyePage);
			
			//以表格形式显示数据
			echo "<table border='1' cellspacing='0' class='chart'>";
			echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>操作</th></tr>";
			
			//取出数据
			for($i=0;$i<count($fenyePage->res_array);$i++){
				$row = $fenyePage->res_array[$i];
				echo "<tr>";
				echo "<td>$row[id]</td><td>$row[name]</td><td>$row[grade]</td><td>$row[email]</td><td>$row[salary]</td>";
				echo "<td><a href='updateEmpUI.php?id=$row[id]'>修改</a> <a onclick='return confirmDel({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'>删除</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			//显示数据
			echo $fenyePage->navigate;
			?>	
			
			<script type="text/javascript">
					function confirmDel(id){
					return window.confirm("是否要删除id="+id+"的用户？");
			
					}
			</script>
			
			<form action="empList.php" method="get">
				跳转到:<input type="text" name="page" id="page" />
				<input id="submit" type="submit" value="Go"/>
			</form>
			
			<script type="text/javascript">
			//跳转页数为数字
				var check = document.getElementById('page');
				var oBody =document.getElementsByTagName('body')[0];
				var oSpan = document.createElement('span');
				var oSubmit = document.getElementById('submit');
				oBody.appendChild(oSpan);
				
				check.onchange=function(){
				var re = /^[0-9]*$/;
				if(!re.test(check.value)){
					oSpan.innerHTML='请输入数字';
					oSpan.style.color='red';
					check.value='';
					oSubmit.setAttribute("disabled",true);
					
				}
				else{
				oSubmit.removeAttribute("disabled");
				oSpan.innerHTML='';
				}
				}
			</script>
	</body>
</html>