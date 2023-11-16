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
                echo "歡迎光臨 " . $_SESSION['user'];
                echo "<a href='logout.php' class='btn btn-info mx-2'>登出</a>";
                echo "<a href='member.php' class='btn btn-success mx-2'>會員中心</a>";
            } else {
            ?>
                <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
                <a href="login_form.php" class="btn btn-success mx-2">登入</a>
            <?php
            }
            ?>
        </div>
    </header>

    <div class="container">
        <h3 class="text-center">使用者資料</h3>

        <!-- 拿資料庫使用者資料 -->
        <?php
        $dsn = "mysql:host=localhost;charset=utf8;dbname=member";
        $pdo = new PDO($dsn, 'root', '');
        // 登入時的SQL語法
        // 確定註冊時的帳號是不能重複的
        // 會員中心不是透過表單傳帳號過來的，是從資料庫撈資料比較，登入後登入者帳號儲存在SESSION變數裡
        $sql = "select * from users where `acc`='{$_SESSION['user']}'";
        $user=$pdo->query($sql)->fetch();
        ?>

        <!-- 整段 會員註冊 的表單 -->
        <!-- 會員資料的表單會action到update.php -->
        <form action="update.php" method="post">
            <div class="col-4 m-auto">
                <div class="input-group my-1">
                    <label class="col-4 input-group-text">帳號:</label>
                    <input class="form-control" type="text" name="acc" id="acc" value="<?=$user['acc'];?>">
                    <!-- name="acc" 就是form表單到add_user.php 傳值 $_POST['acc'] -->
                    <!-- 小於問號等於php的短寫法，用於放一個變數  -->
                    <!-- user所有欄位資料，會顯示在input上，可以再做修改刪除 -->
                </div>
                <div class="input-group my-1">
                    <label class="col-4 input-group-text" for="">密碼:</label>
                    <input class="form-control" type="password" name="pw" id="pw" value="<?=$user['pw'];?>">
                </div>

                <div class="input-group my-1">
                    <label class="col-4 input-group-text" for="">姓名:</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?=$user['name'];?>">
                </div>
                <div class="input-group my-1">
                    <label class="col-4 input-group-text" for="">電子郵件:</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?=$user['email'];?>">
                </div>
                <div class="input-group my-1">
                    <label class="col-4 input-group-text">居住地</label>
                    <input class="form-control" type="text" name="address" id="address" value="<?=$user['address'];?>">
                </div>
                <div class="text-center mt-3">
                    <input class="btn btn-primary mx-2" type="submit" value="更新">
                    <input class="btn btn-warning mx-2" type="reset" value="重置">
                    <input class="btn btn-danger mx-2" type="button" value="讓我消失吧">
                </div>
            </div>
        </form>
    </div>

</body>

</html>