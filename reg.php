<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <!-- bootsrap 連結 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <a href="./index.php">HOME</a>
    <h2 class="text-center mt-3 mb-3">會員註冊</h2>
    <form action="./add_user.php" method="post">
        <div class="col-4 m-auto">
            <div class="input-group my-1">
                <label class="col-4 input-group-text">帳號:</label>
                <input class="form-control" type="text" name="acc" id="acc">
            <!-- name="acc" 就是form表單到add_user.php 傳值 $_POST['acc'] -->
            </div>
            <div class="input-group my-1">
                <label class="col-4 input-group-text" for="">密碼:</label>
                <input class="form-control" type="password" name="pw" id="pw">
            </div>

            <div class="input-group my-1">
                <label class="col-4 input-group-text" for="">姓名:</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="input-group my-1">
                <label class="col-4 input-group-text" for="">電子郵件:</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="input-group my-1">
                <label class="col-4 input-group-text">居住地</label>
                <input class="form-control" type="text" name="address" id="address">
            </div>
            <div class="text-center mt-3">
                <input class="btn btn-primary mx-2" type="submit" value="送出">
                <input class="btn btn-warning mx-2" type="reset" value="重置">
            </div>
        </div>
    </form>
</body>

</html>