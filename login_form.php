<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <!-- boostrap 連結 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <div class="w-50 mx-auto">
        <h2>會員登入</h2>
        <form action="login.php" method="post">
            <?php
                if(isset($_GET['error'])){
                    echo "<span style='color:red'>";
                    echo $_GET['error'];
                    echo "</span>";
                }

            ?>


            <div class="row col-8 my-4">
                <label for="" class="col-3">帳號:</label>
                <input type="text" name="acc" id="acc" class="input col-9">
            </div>
            <div><label for="" class="col-3">密碼:</label>
                <input type="password" name="pw" id="pw" class="input col-9">
            </div>
            <div class="text-center">
                <input type="submit" value="送出" class="btn btn-primary mx-2">
                <input type="submit" value="重置" class="btn btn-danger mx-2">
            </div>
        </form></div>
        
    </div>

</body>

</html>