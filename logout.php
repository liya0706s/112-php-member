<?php

session_start();
// 登出:清除session紀錄
unset($_SESSION['user']);

header("location:index.php");