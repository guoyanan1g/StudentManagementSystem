<?php 
$pdo = new PDO('mysql:host=localhost;dbname=stu_info','root','');
$pdo->exec('set names uft8');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

//毕业时间推算
$year=(int)date ("Y",time ());//获取今年年份
$year-=4;
$grad_date="{$year}".'-06-20'; //如果一个学生的入学日期小于这个时间，说明以及毕业了。
$grad_base_time =strtotime($grad_date); 

$backup_file ="back.txt";
?>