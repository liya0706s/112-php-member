<?php
// 放在最前面
include_once "../include/connect.php";

// 檔案位置 ./ 當前路徑
// 檔案位置 ../ 上一層

// retrieve from login_form.php
$acc=$_POST['acc'];
$pw=$_POST['pw'];

// $dsn="mysql:host=localhost;charset=utf8;dbname=member";
// $pdo=new PDO($dsn,'root','');

// 要確認輸入的帳號密碼在資料庫(sql)裡面有沒有
// sql變數，選擇"所有的資料欄位"是&&符合輸入的帳號密碼$acc和$pw
// $sql="select * from users where `acc`='$acc' && `pw`='$pw'";
// count(*)代表有取得符合的資料數量為1
$sql="select count(*) from users where `acc`='$acc' && `pw`='$pw'";

// 跟我們自訂的find()很像
// 確認一下有無內建函式 count()函式
// Count all elements in an array, or something in an object


$sql="select count(*) from users where `acc`='$acc' && `pw`='$pw'";


// 輸入帳密，會拿到一筆資料fetch()
// PDO查詢和取得的資料，放到變數$user裡
// $user=$pdo->query($sql)->fetch();
// fetchColumn()返回該筆資料中指定欄位的資料
$user=$pdo->query($sql)->fetchColumn();
// print_r($user);
// 資料庫裡面已經比對過一次了
// 用count數一次，代表相符，登入成功

// 變數user裡的acc和pw欄位，是否等於輸入的帳密
// if($user['acc']==$acc && $user['pw']==$pw){
if($user==1){
    // 登入成功，資料會記到SESSION裡面，中括號裡的自己隨便命名大便
    // 把acc帳號放到SESSION裡面(右邊賦予給左邊)
    // 到會員資料那邊會繼續使用 $_SESSION['user'] 變數
    $_SESSION['user']=$acc;
    header("location:../index.php");
}else{
    // 回登入頁，出現錯誤訊息用GET網頁傳值方法就可以
    // ?後面 error=xxxx就是get會出現的內容
    header('location:../login_form.php?error=帳號密碼錯誤');
    // 回到上一層的login_form
}