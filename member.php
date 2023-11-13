<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <!-- boostrap 連結 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
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
                echo "歡迎光臨 ".$_SESSION['user'];
                echo "<a href='logout.php' class='btn btn-info mx-2'>登出</a>";
                echo "<a href='member.php' class='btn btn-success mx-2'>會員中心</a>";
            } else {
            ?>
                <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
                <a href="login.php" class="btn btn-success mx-2">登入</a>
            <?php
            }
            ?>
        </div>
    </header>

    <div class="container">
        <h1>使用者資料</h1>

        <?php
        // 拿資料庫使用者資料
        $dsn = "mysql:host=localhost;charset=utf8;dbname=member";
        $pdo = new PDO($dsn, 'root', '');
        // 沒有表單$user, 帳號是暫存的$_SESSION
        $sql="select * "
        ?>


        <form action="update.php" method="post">
            <div class="col-g3 align-items-center">
                <div class="input-group my-1">
                    <label class="col-4 input-group-text">帳號:</label>
                    <input class="form-control" type="text" name="acc" id="acc" value="<?= $user['acc'] ?>">
                </div>
                <div class="col-auto">
                    <label for="">密碼:</label>
                    <input type="password" name="pw" id="pw" value="">
                </div>

                <div class="col-auto">
                    <label for="">姓名:</label>
                    <input type="text" name="name" id="name" value="">
                </div>
                <div>
                    <label for="">電子郵件:</label>
                    <input type="text" name="email" id="email" value="">
                </div>
                <div>
                    <label>居住地</label>
                    <input type="text" name="address" id="address" value="">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="更新">
                    <input class="btn btn-warning" type="reset" value="重置">
                    <input class="btn btn-info" type="button" value="刪除">
                </div>
            </div>
        </form>
    </div>

</body>

</html>