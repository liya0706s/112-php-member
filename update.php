<?php

include_once "./include/connect.php";

// 資料清洗先省略，工作要用

// 格式先打好，再輸入值
$sql="update `users` 
set `acc`='{$_POST['acc']}',
    `pw`='{$_POST['pw']}', 
    `name`='{$_POST['name']}', 
    `email`='{$_POST['email']}',
    `address`='{$_POST['address']}' 
where `id`='{$_POST['id']}' ";

if($pdo->exec($sql)>0){
    $_SESSION['msg']="更新成功!";
}else{
    $_SESSION['msg']="資料無異動:P";
}
// 判斷為1代表有更新資訊

// echo $sql;
// 印出更新後的sql資料不可能給client看
// 也可以回db看，但是client看不到


// 更新完回會員中心
// header();
