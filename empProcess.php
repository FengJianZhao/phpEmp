<?php		

	require_once 'EmpService.class.php';
	//接收用户要删除的id
	//创建了EmpService对象实例
	$empService = new EmpService();
	
	//先看看用户要分页还是要删除雇员
	if(!empty($_REQUEST['flag'])){
		
		//接收FLAG值
		$flag = $_REQUEST['flag'];
	
	//如果是del,说明用户想要删除雇员
		if($flag=="del"){
			
			$id = $_REQUEST['id'];
			if($empService->delEmpById($id)==1){
				header("Location:empList.php");
				exit();
				}
			else{
				header("Location:error.php");
				exit();
				}
		}
		else if($flag=="addemp"){
			//说明用户希望执行添加雇员
			//接收数据
			$name = $_POST['name'];
			$grade = $_POST['grade'];
			$email = $_POST['email'];
			$salary = $_POST['salary'];
			
			//完成添加任务
			$res=$empService->addEmp($name, $grade, $email, $salary);
			
			if($res==1){
				header("Location:OK.php");
				exit();
			}
			else{
				header("Location:error.php");
				exit();
			}
			
		}
		//处理修改请求
		else if($flag=="updateemp"){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$grade = $_POST['grade'];
			$email = $_POST['email'];
			$salary = $_POST['salary'];
			//完成修改数据库
			$res=$empService->updateEmp($id, $name, $grade, $email, $salary);
			
			if($res==1){
				header("Location:OK.php");
				exit();
			}
			else{
				header("Location:error.php");
				exit();
			}
		}
	}


?>