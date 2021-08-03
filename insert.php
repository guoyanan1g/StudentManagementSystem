<?php 
include 'config.php';
$id=(int)$_POST['id'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$score=(int)$_POST['score'];
$class=(int)$_POST['class'];
$birthday=strtotime($_POST['birday']);

//准备sql语句
$sql="INSERT INTO student(id,name,sex,score,class,birthday) VALUES ($id,'$name','$sex',$score,$class,'$birthday')";
//echo $sql;
//预处理
$smt=$pdo->prepare($sql); //PDOStatement

if($smt->execute()){
	echo "<script>location='print.php?sortid=0&whereid=-1&wherename='</script>";
} else {
    echo '<script language="javascript">';
    echo 'alert("插入失败")';  //not showing an alert box.
    echo '</script>';
    echo "<script>location='print.php?sortid=0&whereid=-1&wherename='</script>";
    exit;
}
 ?>