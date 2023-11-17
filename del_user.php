<?php

include_once "./include/connect.php";

$sql="delete from `users` where `id`='{$_GET['id']}'";
// 消失吧那邊的onclick取得的使用者id

$pdo->exec($sql);

unset($_SESSION['user']);

header("location:index.php");