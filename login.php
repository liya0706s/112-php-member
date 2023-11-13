<?php
session_start();
// retrieve
$acc=$_POST['acc'];
$pw=$_POST['pw'];

$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');

// $sql="select * from users where `acc`='$acc' && `pw`='$pw'";
$sql="select count(*) from users where `acc`='$acc' && `pw`='$pw'";
// $user=$pdo->query($sql)->fetch();
$user=$pdo->query($sql)->fetchColumn();
print_r($user);
// 資料庫裡面已經比對過一次了
// 用count數一次，代表相符，登入成功

if($user==1){
    $_SESSION['user']=$acc;
    header("location:index.php");
}else{
    header('location:login_form.php?error=帳密錯誤');
}