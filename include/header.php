<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>哈哈購物商城</h1>
    <header class="nav">
        <div class="nav-item col-4"></div>
        <div class="nav-item col-4">
            <ul class="d-flex justify-content-evenly">
                <li>1</li>
                <li>2</li>
                <li>3</li>
            </ul>
        </div>
        <div class="nav-item col-4">

            <?php
            if (isset($_SESSION['user'])) {
                // 登入成功，歡迎光臨 登入者帳號
                echo "歡迎光臨 " . $_SESSION['user'];
                // 登入成功的完整按鈕選項還有，登出和會員資料
                echo "<a href='./api/logout.php' class='btn btn-info mx-2'>登出</a>";
                echo "<a href='member.php' class='btn btn-success mx-2'>會員中心</a>";
            } else {
                // 如果不是登入成功，會看到 註冊 跟 登入 按鈕
            ?>
                <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
                <a href="login_form.php" class="btn btn-success mx-2">登入</a>
            <?php
            }
            ?>
        </div>
    </header>
</body>

</html>