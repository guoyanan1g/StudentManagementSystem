<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script>
		function conFirm() {
			if (confirm("确定要删除吗?")) return true;
			else return false;
		}
	</script>
</head>
<body>
		
		
</body>
</html>
<?php
	session_start();
	error_reporting(0);
    include 'config.php';
    $sort=(int)$_GET['sortid']; 
    $whereid=(int)$_GET['whereid'];
    $wherename=$_GET['wherename'];
	$ad=$_GET['ad'];
	if($ad==1){
		$sql ="select * from admin";
	}
	else{
    	if ($whereid==0) {
        	$sql="select * from student where name like '%{$wherename}%'";
    	} else if ($whereid==-1) {
        	$sql='select * from student';
   		}else{
//        $sql="select * from student where id=?";
       		$sql="select * from student where id='{$whereid}'";
    	}
    	switch ($sort) {
        	case 0:$sql=$sql.' order by id';break;
        	case 1:$sql=$sql.' order by id desc';break;
        	case 2:$sql=$sql.' order by score';break;
        	case 3:$sql=$sql.' order by score desc';break;
    	}
	}

    $smt=$pdo->prepare($sql);
//    if ($whereid>=0) {
//        $smt->bindValue(1,$whereid,PDO::PARAM_INT);
//    }
    $smt->execute();
    $result=$smt->fetchAll();
	if($ad==1){
		echo '<h1 class="page-header">
		管理员信息:
	</h1>
	<table class="table table-striped table-hover table-bordered ">
		<tr>
			<th style="text-align: center;">用户名</th>
			<th style="text-align: center;">权限</th>
			<th style="text-align: center;">删除</th>
		</tr>';
		foreach ($result as $key => $value) {
			echo "<td class='username' align='center'><b>{$value['username']}</b></td>";
			echo "<td class='level' align='center'><b>{$value['level']}</b></td>";
			if($value['level']=='root') {
				echo "<td></td>";
			}
			else
				echo "<td><a href='delete.php?username={$value['username']}'onclick='return conFirm()' class='btn btn-danger btn-block' >删除</td>";
			echo "</tr>";
		}
	}
	else{
		echo '<h1 class="page-header">
		学生信息:
	</h1>
	<table class="table table-striped table-hover table-bordered ">
		<tr>
			<th style="text-align: center;">学号</th>
			<th style="text-align: center;">姓名</th>
			<th style="text-align: center;">性别</th>.
			<th style="text-align: center;">班级号</th>
			<th style="text-align: center;">学分绩</th>
			<th style="text-align: center;">入学日期</th>
			<th style="text-align: center;">学籍状态</th>
			<th style="text-align: center;">删除</th>
			<th style="text-align: center;">修改</th>
		</tr>';
		foreach ($result as $key => $value) {
			$status='合格';
			if($value['score']<60)
				$status='试读';
			else if($value['score']>=90)
				$status='优秀';
			$birthday=$value['birthday'];
			if($birthday<=$grad_base_time)
				$status.='(已毕业)';
			echo "<tr id='{$value['id']}'>";
			echo "<td class='danger' align='center'><b>{$value['id']}</b></td>";
			echo "<td class='success' align='center'><b>{$value['name']}</b></td>";
			echo "<td class='info' align='center'><b>{$value['sex']}</b></td>";
			echo "<td class='warning' align='center'><b>{$value['class']}</b></td>";
			echo "<td class='warning' align='center'><b>{$value['score']}</b></td>";
			echo "<td class='warning' align='center'><b>".date('Y-m-d',$birthday)."</b></td>";
			echo "<td class='warning' align='center'><b>{$status}</b></td>";
			echo "<td><a href='delete.php?id={$value['id']}'onclick='return conFirm()' class='btn btn-danger btn-block' >删除</td>";
			echo "<td><a href='update_view.php?id={$value['id']}' class='btn btn-primary btn-block' >修改</td>";
			echo "</tr>";
		}
	}
 ?>