<?php
include "config.php";
session_start();
$do_back=$_GET["do_back"];
$sql="SELECT * FROM student";

if($_SESSION['level']=='root'&&$do_back==1){
    

    $smt=$pdo->prepare($sql);
    $smt->execute();
    $result=$smt->fetchAll();
    try{
        foreach($result as $key1 => $values){
            foreach($values as $key2 =>$val){
                file_put_contents($backup_file,$val." ",FILE_APPEND);
            }
            file_put_contents($backup_file,"\n",FILE_APPEND);
        }
        file_put_contents($backup_file,"备份时间：".time()."\n",FILE_APPEND);
    }catch(Exception $e){
        echo "备份失败";die();
    }
    echo "备份成功";
}
else{
    header("Location:admin.php");
}

//print_r($result);
/*数据结构如下
Array ( [0] => Array ( [id] => 1 [name] => 王小明 [sex] => 男 [class] => 1 [score] => 80 [birthday] => 1599256800 ) 
[1] => Array ( [id] => 2 [name] => 郭亚南 [sex] => 男 [class] => 2 [score] => 100 [birthday] => 1567634400 ) 
[2] => Array ( [id] => 3 [name] => 张晓军 [sex] => 男 [class] => 3 [score] => 59 [birthday] => 1599256800 ) 
[3] => Array ( [id] => 6 [name] => 王鹏 [sex] => 男 [class] => 1 [score] => 66 [birthday] => 1473026400 ) ) 
*/



?>