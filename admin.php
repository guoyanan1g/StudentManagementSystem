<?php
error_reporting(0);
include "config.php";
$username=$_POST['username'];
$password=$_POST['password'];


$sql="select * from admin where username='$username' and password='$password'";

$smt=$pdo->prepare($sql);   //预编译，防止了sql注入；
$smt->execute();
$result=$smt->fetchAll();
//result是一个二维数组
$username=$result[0]['username'];
$level=$result[0]['level'];



if($result===array()||!preg_match("/select|\'|\/\*|\#|\--|\ --|\/|\*|\-|\+|\=|\~|\*@|\*!|\$|\%|\^|\&|\(|\)|\/|\/\/|\.\.\/|\.\/|union|into|load_file|outfile/",$username)){ //没有匹配的结果
  echo ('<script>alert("用户名或密码错误")</script>');
}
else {
  //身份认证成功，开启session；跳转；
  session_start();
  $_SESSION['username']=$username;
  $_SESSION['level']=$level;
  if($_SESSION['level']==='root'){
		header("Location:index_root.php");
	}
  else
    header('Location:index.php');
}
?>
<html>
<head>
<title>学籍管理系统后台</title>
<meta >
</head>
<!--全局样式-->
<style>
body
{
  background:url(1.jpg);  
  width:100%;
    height:100%;
    background-size:100% 100%;

}

 
.Form{
position: absolute;
width: 300px;
height: 20px;
text-align: center;
vertical-align:middle;
top: 80%;
left: 45%;
margin-top: -200px;      
margin-left: -150px;
}
 #form是输入框div的class
</style>


<body>

<div class="tle" style="text-align:center;top:10%"><font size='11' style='font-family : 宋体;'>
<br><br><b>HIT学籍管理系统<font></div>

<div class="form"style="text-align:center" >
<form action='admin.php' method='post' >
<font size='3'style='font-family : 宋体;'><em>&nbsp;用户名:</em> <font> <input type="text" name="username" style="text-align:center;width:200px;height:25px;">
<br><br><br>
<font size='3' style='font-family : 宋体;'><em>&nbsp;密码:</em> <font><input type="password" name="password" style="text-align:center;width:200px;height:25px;">
<br>
<br>
<input type="submit" value="登录" style="background-color:aquamarine; text-align:60%; font-size:20px;font-family : 宋体;" >
</form> 
</div>

</body>
</html>
