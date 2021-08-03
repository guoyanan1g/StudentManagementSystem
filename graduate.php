<?php
include "config.php";
error_reporting(0);

$del=$_GET['del'];


if($del==1){
    $pdo->beginTransaction();
    try{
	//准备sql语句
	    $sql="DELETE FROM student WHERE birthday<={$grad_base_time}";
	    $smt=$pdo->prepare($sql);
	    $smt->execute();
	    $pdo->commit();
    }catch(PDOException $e){
	    $pdo->rollBack();
    }
}
echo "<script>alert('删除成功')</script>";
echo "<script>location='print.php?sortid=0&whereid=-1&wherename='</script>";
exit;
?>
