<?php
// 連線資料庫是需要帳密和效能的，不建議用include
session_start();

// 登出:清除session紀錄
unset($_SESSION['user']);

header("location:index.php");