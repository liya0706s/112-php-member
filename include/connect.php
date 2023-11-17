<?php
// 資料庫連線
$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');
// SESSION傳值開始
session_start();
?>