<?php
// include_once "../include/connect.php";
include_once "../include/db.php";

$_POST['acc'] = htmlspecialchars(trim($_POST['acc']));

/* $sql="insert into `users`(`acc`,`pw`,`name`,`email`,`address`) 
                   values('{$acc}','{$_POST['pw']}','{$_POST['name']}','{$_POST['email']}','{$_POST['address']}')";

$pdo->exec($sql); */

$User->save($_POST);

// 瀏覽器導向首頁
header("location:../index.php");
