<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <!-- boostrap 連結 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <h2>會員註冊</h2>
    <form action="./add_user.php" method="post">
        <div class="col-g3 align-items-center">
            <div class="input-group my-1">
                <label class="col-4 input-group-text">帳號:</label>
                <input class="form-control" type="text" name="acc" id="acc">
            </div>
            <div class="col-auto">
            <label for="">密碼:</label>
            <input type="password" name="pw" id="pw">
            </div>

            <div class="col-auto">
                <label for="">姓名:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="">電子郵件:</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label>居住地</label>
                <input type="text" name="address" id="address">
            </div>
            <div>
                <input type="submit" value="送出">
                <input type="reset" value="重置">
            </div>
        </div>
    </form>
</body>

</html>