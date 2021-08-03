<?php
include 'config.php';
$id=$_GET['id'];

$sql='select * from student where id=?';

$smt=$pdo->prepare($sql);

$smt->bindValue(1,(int)$id);

$smt->execute();
$default=$smt->fetchAll();

if (count($default) == 0) {
    echo '<script language="javascript">';
    echo 'alert("ID不存在")';  //not showing an alert box.
    echo '</script>';
    echo "<script>location='print.php?sortid=0&whereid=-1&wherename='</script>";
    exit;
}
// echo "<pre>";
// print_r($default);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="bootstrap/css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/jquery.datetimepicker.full.js"></script>
</head>
<body>
<div class="container">
    <h1 class="page-header">
        您要的修改的ID为:<?php
            echo $id;
        ?>
    </h1>
</div>

<form action='update_db.php' method='post' class="form-horizontal">
    <div class="form-group has-success">
        <label for="" class="col-md-2 control-label">ID</label>
        <div class="col-md-8">
            <input type="text" name="id" id="id" class="form-control" value="<?php
            echo $default[0]['id'];
            ?>">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="" class="col-md-2 control-label">姓名</label>
        <div class="col-md-8">
            <input type="text" name="name" id="name" class="form-control" value="<?php
            echo $default[0]['name'];
            ?>">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="" class="col-md-2 control-label">性别</label>
        <div class="col-md-8">
            <input type="text" name="sex" id="sex" class="form-control" value="<?php
            echo $default[0]['sex'];
            ?>">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="" class="col-md-2 control-label">班级ID</label>
        <div class="col-md-8">
            <input type="text" name="class" id="class" class="form-control" value="<?php
            echo $default[0]['class'];
            ?>">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="" class="col-md-2 control-label">学分绩</label>
        <div class="col-md-8">
            <input type="text" name="score" id="score" class="form-control" value="<?php
            echo $default[0]['score'];
            ?>">
        </div>
    </div>
    <div class="form-group has-success">
        <label for="" class="col-md-2 control-label">出生日期</label>
        <div class="col-md-8">
            <input type="text" name="birday" id="datepicker" class="form-control" value="<?php
            echo date('Y-m-d',$default[0]['birthday']);
            ?>">
        </div>
    </div>
    <div class="form-group col-md-6 ">
        <button class="col-md-offset-6 btn btn-primary btn-block" type="submit">提交</button>
    </div>


</form>
<script>
    $('#datepicker').datetimepicker({
            lang:'ch',
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-m-d',
        }
    );
</script>
</body>
</html>