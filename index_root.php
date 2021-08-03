<?php
	include "config.php";
	session_start();

	echo "<p style='font-size: 20px;color:red;font-family:宋体;text-align:center;'>
	欢迎用户{$_SESSION['username']}<br>您的权限是:{$_SESSION['level']}
	</p>";

	
/**"<div class='col-md-3 col-md-offset-1'>
		<h1 class='page-header'>
				root选项：
			</h1>
			<button class='btn btn-primary btn-block active' id='exit'>
			<span class='glyphicon glyphicon-hand-right'></span>&nbsp;添加admin
		</button>
		<button class='btn btn-primary btn-block active' id='display'>
			<span class='glyphicon glyphicon-hand-right'></span>&nbsp;显示admin
		</button>
		<button class='btn btn-primary btn-block active' id='remove' data-toggle='modal' data-target='#myModal'>
			<span class='glyphicon glyphicon-hand-right'></span>&nbsp;删除admin
		</button>
		" */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生档案管理系统</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script$_SESSION>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<style>
		.dropdown{
			margin-top: 5px;
		}
	</style>
</head>
<body>
	
	<div class="col-md-3 col-md-offset-1">
		<h1 class="page-header">
				操作分类：
			</h1>
			<button class="btn btn-primary btn-block active" id="exit">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;退出系统
		</button>
		<button class="btn btn-primary btn-block active" id="graduate">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;删除毕业生
		</button>
		<button class="btn btn-primary btn-block active" id="bak">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;数据库备份
		</button>
		<button class="btn btn-primary btn-block active" id="ad-display">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;显示所有管理员
		</button>
		<button class="btn btn-primary btn-block active" id="ad-remove">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;删除管理员
		</button>
		<button class="btn btn-primary btn-block active" id="display">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;显示所有学生
		</button>
		<button class="btn btn-primary btn-block active" id="add">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;添加学生
		</button>
		<button class="btn btn-primary btn-block active" id="remove" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-hand-right"></span>&nbsp;删除学生
		</button>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" style='color: #f0ad4e' id="myModalLabel">注意!!!</h4>
					</div>
					<div class="modal-body">
				        请管理员谨慎操作!
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>
		<div class="dropdown">
			<button class="btn btn-warning btn-block dropdown-toggle active" data-toggle='dropdown'>
				查找学生 <span class="glyphicon glyphicon-chevron-down"></span>
			</button>
			<div class="dropdown" style='display: none;' role="menu" >
				<button href="#" class="btn btn-success btn-block dropdown-toggle">
					<span class="glyphicon glyphicon-hand-right"></span>&nbsp;按学号查找</button>
				<div class="dropdown" style='display: none;' role="menu" >
					<input type="text" name="" id="searchid" class="form-control" placeholder="输入要查找的学号">
					<a href="javascript:" class="btn btn-info btn-block" style='margin-top: 5px;' id="searchbyid"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;点击进行查找</a>
				</div>
				<button href="#" class="btn btn-success btn-block dropdown-toggle" style="margin-top: 5px;"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;按姓名查找</button>
				<div class="dropdown" style='display: none;' role="menu" >
					<input type="text" name="" id="searchname" class="form-control" placeholder="输入要查找的姓名">
					<a href="javascript:" class="btn btn-info btn-block" style='margin-top: 5px;' id="searchbyname"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;点击进行查找</a>
				</div>
			</div>
		</div>
		<div class="dropdown">
			<button class="btn btn-warning btn-block dropdown-toggle active" data-toggle='dropdown'>
				排序学生 <span class="glyphicon glyphicon-chevron-down"></span>
			</button>
			<div class="dropdown" style='display: none;' role="menu" >
				<a href="#" class="sort btn btn-success btn-block"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;按学号排序(升序)</a>
				<a href="#" class="sort btn btn-success btn-block"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;按学号排序(降序)</a>
				<a href="#" class="sort btn btn-success btn-block"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;按学分绩排序(升序)</a>
				<a href="#" class="sort btn btn-success btn-block"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;按学分绩排序(降序)</a>
			</div>
		</div>
		<div class="dropdown">
			<button class="btn btn-warning btn-block dropdown-toggle active" class="update">根据学号修改信息 <span class="glyphicon glyphicon-chevron-down"></span></button>
			<div class="drop" style='display: none;' role="menu" >
				<input type="text" name="" id="stdid" class="form-control" placeholder="输入要修改的id号">
				<a href="javascript:" class="btn btn-success btn-block" style='margin-top: 5px;' id="change_confirm">
					<span class="glyphicon glyphicon-hand-right"></span>&nbsp;点击进行修改
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-8"  >
		<iframe id='control' src="print.php?sortid=0&whereid=-1&wherename=''" frameborder="0" width="100%"height="1000px"></iframe>
	</div>
</body>
<script>
    $('.dropdown-toggle').click(
        function () {
            $(this).next().slideToggle();
        }
    );
    document.getElementById('change_confirm').onclick = function () { //确认改变
        change_id = document.getElementById('stdid').value;
        document.getElementById('control').src = 'update_view.php?id=' + change_id;
    };
    document.getElementById('display').onclick = function () { //展示所有学生信息
        document.getElementById('control').src = "print.php?sortid=0&whereid=-1&wherename=''";
    };
	document.getElementById('graduate').onclick = function () { //毕业生删除
        document.getElementById('control').src = "graduate.php?del=1";
    };
	
	document.getElementById('ad-display').onclick = function () { //展示管理员信息
        document.getElementById('control').src = "print.php?ad=1";
    };
	document.getElementById('ad-remove').onclick = function () { //删除管理员
        document.getElementById('control').src = "";
    };
    document.getElementById('add').onclick = function () {  //添加学生
        document.getElementById('control').src = 'insert_view.html';
    };
	document.getElementById('exit').onclick = function () { //退出
        <?php unset($_SESSION)?> 
		location.href ="admin.php";
    };
    document.getElementById('remove').onclick = function () {  //删除学生
        document.getElementById('control').src = "print.php?sortid=0&whereid=-1&wherename=''";
    };
	document.getElementById('bak').onclick = function () {  //数据库备份
        document.getElementById('control').src = "backup.php?do_back=1";
    };
	sortobj=document.getElementsByClassName('sort');
	function transform(obj) {
 	// 定义转换函数，将对象数组转换为数组
		var arr = [];
		for(var item in obj){
        arr.push(obj[item]);
    }
    return arr;
	};
	sort_obj=transform(sortobj);
	for (var i = sort_obj.length - 1; i >= 0; i--) {
	    sort_obj[i].onclick=function(){
	        sort_id=sort_obj.indexOf(this);
	        document.getElementById('control').src='print.php?sortid='+sort_id+"&whereid=-1&wherename=''";
	    }
	}
    document.getElementById('searchbyid').onclick = function () {
        search_id = document.getElementById('searchid').value;
        document.getElementById('control').src = "print.php?sortid=0&whereid=" + search_id + "&wherename=''";
    };
    document.getElementById('searchbyname').onclick = function () {
        search_name = document.getElementById('searchname').value;
        document.getElementById('control').src = "print.php?sortid=0&whereid=0&wherename=" + search_name;
    };
</script>
</html>