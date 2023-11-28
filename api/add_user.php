<?php
// include_once "../include/connect.php";
include_once "../include/db.php";
$_POST['acc'] = htmlspecialchars(trim($_POST['acc']));

$User->save($_POST);

// 瀏覽器導向首頁
header("location:../index.php");
