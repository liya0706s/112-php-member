<?php

include_once "../include/connect.php";

// 資料清洗先省略，但是工作時需要核對表單內容檢查

// 格式先打好，再輸入值
// 將資料傳到資料庫裡面做更新
$sql="update `users` 
set `acc`='{$_POST['acc']}',
    `pw`='{$_POST['pw']}', 
    `name`='{$_POST['name']}', 
    `email`='{$_POST['email']}',
    `address`='{$_POST['address']}' 
where `id`='{$_POST['id']}' ";


// 有更新一筆資料，成功的話會回傳1
// SESSION資料會存在server
// 如果只為了這一次更新暫存判斷使用，使用完要刪除
if($pdo->exec($sql)>0){
    $_SESSION['msg']="更新成功!";
}else{
    $_SESSION['msg']="資料無異動";
}
// 判斷為1代表有更新資訊

// 更新完回會員中心
header("location:../member.php");
