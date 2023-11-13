<?php

if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else {
    $month = date('m');
}

switch ($month) {
    case "1":
        $Bg = "jan.jpeg";
        break;
    case "2":
        $Bg = "feb.jpeg";
        break;
    case "3":
        $Bg = "march.jpeg";
        break;
    case "04":
        $Bg = "april.jpeg";
        break;
    case "05":
        $Bg = "may.jpeg";
        break;
    case "06":
        $Bg = "june.jpeg";
        break;
    case "07":
        $Bg = "july.jpeg";
        break;
    case "08":
        $Bg = "aug.jpeg";
        break;
    case "09":
        $Bg = "sep.jpeg";
        break;
    case "10":
        $Bg = "oct.jpeg";
        break;
    case "11":
        $Bg = "nov.jpeg";
        break;
    case "12":
        $Bg = "dec.jpeg";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上萬年曆</title>
    <!-- fontawesome 連結 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css 連結 -->
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <?php

    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
    } else {
        $month = date('m');
        $year = date('Y');
    }

    $thisFirstDay = date("{$year}-{$month}-1");
    $thisFirstDate = date('w', strtotime($thisFirstDay));
    $thisMonthDays = date("t");
    $thisLastDay = date("{$year}-{$month}-$thisMonthDays");
    $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7);
    $firstCell = date("Y-m-d", strtotime("-$thisFirstDate days", strtotime($thisFirstDay)));
    ?>

    <h1 class="header">
        Calendar
    </h1>

    <nav class="nav">
        <div class="form">
            <form action="check.php" method="get">
                <input type="text" placeholder="年份" name="year">
                <input type="text" placeholder="月份" name="month">
                <button type="submit">Search
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="home">
            <a href="calendar2.php">HOME</a>
        </div>
    </nav>

    <div class="container">
        <div class="table_tri">
            <div class="bt_left">
                <?php
                $nextYear = $year;
                $prevYear = $year;

                if (($month - 1) < 1) {
                    $prev = 12;
                    $prevYear = $year - 1;
                } else {
                    $prev = $month - 1;
                }
                ?>
                <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>">
                    <i class="fa-solid fa-circle-left"></i>
                </a>

            </div>
            <div class="table_two">

                <h2 class="title">
                    <?php
                    if (isset($_GET['month']) && isset($_GET['year'])) {
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                        // 使用 strtotime 函數建立日期
                        $date = strtotime("$year-$month-01");
                        // 格式化日期
                        echo date('F Y', $date);
                    } else {
                        // 如果未提供 URL 參數，則使用當前日期
                        echo date('F Y');
                    }
                    ?>
                </h2>

                <div class="table">
                    <table>
                        <tr class="th">
                            <td style='color:red'>SUN</td>
                            <td>MON</td>
                            <td>TUE</td>
                            <td>WED</td>
                            <td>THU</td>
                            <td>FRI</td>
                            <td style='color:red'>SAT</td>
                        </tr>


                        <?php
                        for ($i = 0; $i < $weeks; $i++) {
                            echo "<tr>";
                            for ($j = 0; $j < 7; $j++) {
                                $addDays = 7 * $i + $j;
                                $thisCellDate = strtotime("+$addDays days", strtotime($firstCell));

                                if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) {
                                    echo "<td style='color:red'>";
                                } else {
                                    echo "<td>";
                                }

                                if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                                    echo date("j", $thisCellDate);
                                    // 月份中的日期
                                }
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                        ?>
                </div>
            </div>

            <div class="bt_right">
                <?php
                $nextYear = $year;
                $prevYear = $year;
                if (($month + 1) > 12) {
                    $next = 1;
                    $nextYear = $year + 1;
                } else {
                    $next = $month + 1;
                }
                ?>

                <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>">
                    <i class="fa-solid fa-circle-right"></i>
                </a>
            </div>
        </div>

        <asider class="asider">
            <img src="/calendar_img/<?php echo $Bg; ?>" alt="" width="840px">
        </asider>
    </div>

    <footer class="footer">
        footer
    </footer>

</body>