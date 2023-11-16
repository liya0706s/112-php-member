<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');

// 用sql語法，新增reg.php form的資料，用pdo執行語句(连接数据库的使用接口)
$sql="insert into `users`(`acc`,`pw`,`name`,`email`,`address`)
                    values('{$_POST['acc']}','{$_POST['pw']}','{$_POST['name']}','{$_POST['email']}','{$_POST['address']}')";

$pdo->exec($sql);

// 瀏覽器導向首頁
header("location:index.php");