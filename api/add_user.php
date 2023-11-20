<?php
// $dsn="mysql:host=localhost;charset=utf8;dbname=member";
// $pdo=new PDO($dsn,'root','');
// 以上重複出現的片段程式碼放在inc資料夾，connect.php檔案中
include_once "../include/connect.php";
$acc=htmlspecialchars(trim($_POST['acc']));

// 用sql語法，新增reg.php form的POST資料，用pdo執行語句(連接數據庫的使用接口)
$sql="insert into `users`(`acc`,`pw`,`name`,`email`,`address`)
                    values('{$acc}','{$_POST['pw']}','{$_POST['name']}','{$_POST['email']}','{$_POST['address']}')";

$pdo->exec($sql);

// 瀏覽器導向首頁
header("location:../index.php");