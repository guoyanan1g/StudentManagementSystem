<?php
	include 'config.php';
	$change_data=$_POST;
	// echo "<pre>";
    // print_r($change_data);
    // echo "</pre>";
    $pdo->beginTransaction();
    try{
        //修改用户名
        $sql1='update student set id=? where id=?';
        $smt1=$pdo->prepare($sql1);
        $smt1->bindValue(1,$change_data['id'], PDO::PARAM_INT);
        $smt1->bindValue(2,$change_data['id'], PDO::PARAM_INT);
        $smt1->execute();

        $sql2='update student set name=? where id=?';
        $smt2=$pdo->prepare($sql2);
        $smt2->bindValue(1,$change_data['name'], PDO::PARAM_STR);
        $smt2->bindValue(2,$change_data['id'], PDO::PARAM_INT);
        $smt2->execute();

        $sql3='update student set sex=? where id=?';
        $smt3=$pdo->prepare($sql3);
        $smt3->bindValue(1,$change_data['sex'], PDO::PARAM_STR);
        $smt3->bindValue(2,$change_data['id'], PDO::PARAM_INT);
        $smt3->execute();

        $sql4='update student set class=? where id=?';
        $smt4=$pdo->prepare($sql4);
        $smt4->bindValue(1,$change_data['class'], PDO::PARAM_INT);
        $smt4->bindValue(2,$change_data['id'], PDO::PARAM_INT);
        $smt4->execute();

        $sql5='update student set score=? where id=?';
        $smt5=$pdo->prepare($sql5);
        $smt5->bindValue(1,$change_data['score'],PDO::PARAM_INT);
        $smt5->bindValue(2,$change_data['id'], PDO::PARAM_INT);
        $smt5->execute();

        $sql6='update student set birthday=? where id=?';
        $smt6=$pdo->prepare($sql6);
        $smt6->bindValue(1,strtotime($change_data['birday']),PDO::PARAM_STR);
        $smt6->bindValue(2,$change_data['id'], PDO::PARAM_INT);
        $smt6->execute();

        $pdo->commit();
        echo("<script>location='print.php?sortid=0&whereid=-1&wherename="."'</script>");
    }catch(PDOException $e){
        $pdo->rollBack();
    }
 ?>