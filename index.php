<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boostrap 連結 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>首頁</title>
</head>

<body>
    <div id="app" class="container">
        <h1>哈哈購物商城</h1>
        <header class="nav">
            <div class="nav-item col-4"></div>
            <div class="nav-item col-4 justify-content-evenly">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
        <div class="nav-item col-4">
            <?php
                if(isset($_SESSION['user'])){
                    echo "歡迎光臨 ".$_SESSION['user'];
                    echo "<a href='logout.php' class='btn btn-info mx-2'>登出</a>";
                    echo "<a href='member.php' class='btn btn-success mx-2'>會員中心</a>";
                }else{
                    ?>
            <a href="reg.php">註冊</a>
            <a href="login.php">登入</a>
        <?php
        }
        ?>
        </div>
        </header>
    </div>
</body>

</html>