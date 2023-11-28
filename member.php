<?php
include_once "./include/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <!-- bootsrap5 連結 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    <?php include "./include/header.php"; ?>
        <h3 class="text-center">使用者資料</h3>
        <?php
        if (isset($_SESSION['msg'])) {
            echo "<div class='alert alert-warning text-center col-6 m-auto'>";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            echo "</div>";
        }

        // $sql = "select * from users where `acc`='{$_SESSION['user']}'";
        // $user = $pdo->query($sql)->fetch();

        // 用使用者帳號(前提是帳號不能重複)找到資料陣列帶入，member的資料自動帶入input
        $user=find('users',['acc'=>"{$_SESSION['user']}"]);

        ?>

        <!-- 整段 會員註冊 的表單 -->
        <!-- 會員資料的表單會action到update.php -->
        <!-- 所有要更新的資料，包含id因為要條件哪一筆(id)更新 -->
        <!-- update.php網頁按F12>payload，會有這裡傳送過去的form data -->
        <form action="./api/update.php" method="post">
            <div class="col-4 m-auto">
                <div class="input-group my-1">
                    <label class="col-4 input-group-text">帳號:</label>
                    <input class="form-control" type="text" name="acc" id="acc" value="<?= $user['acc']; ?>">
                    <!-- name="acc" 就是form表單到add_user.php 傳值 $_POST['acc'] -->
                    <!-- input屬性value等於，小於問號等於php的短寫法，抓變數$user的資料(登入時PDO查詢取得的資料)  -->
                    <!-- user所有欄位資料，會顯示在input上，可以再做修改刪除 -->
                </div>
                <div class="input-group my-1">
                    <label class="col-4 input-group-text" for="">密碼:</label>
                    <!-- label後面要有for接id -->
                    <input class="form-control" type="password" name="pw" id="pw" value="<?= $user['pw']; ?>">
                </div>

                <div class="input-group my-1">
                    <label class="col-4 input-group-text" for="">姓名:</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?= $user['name']; ?>">
                </div>
                <div class="input-group my-1">
                    <label class="col-4 input-group-text" for="">電子郵件:</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?= $user['email']; ?>">
                </div>
                <div class="input-group my-1">
                    <label class="col-4 input-group-text">居住地</label>
                    <input class="form-control" type="text" name="address" id="address" value="<?= $user['address']; ?>">
                </div>
                <div class="text-center mt-3">
                    <input type="hidden" name="id" value="<?=$user['id'];?>">
                    <!-- hidden屬性代表input標籤不會顯示在畫面上，把id值帶過來，知道是要修改的該筆 -->
                    <input class="btn btn-primary mx-2" type="submit" value="更新">
                    <input class="btn btn-warning mx-2" type="reset" value="重置">
                    <input class="btn btn-danger mx-2" type="button" value="讓我消失吧" onclick="location.href='./api/del_user.php?id=<?= $user['id']; ?>'">
                    <!-- 比較:屬性button只是按鈕外型，沒有功能；在form表單裡放button標籤，預設是submit -->
                    <!-- 表單裡面不能包表單，所以把消失表單POST的按鈕放在這個表外面，用GET/POST有?id=xx帶到del_user -->

                    <!-- 使用input的button屬性，透過onclick事件觸發，javascript指令.href，完成刪除使用者，網址方式接收是GET -->
                </div>
            </div>
        </form>
        <?php include "./include/footer.php"; ?>
    </div>

</body>

</html>